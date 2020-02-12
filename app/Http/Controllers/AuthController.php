<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Allergen;
use App\Models\Cart;

class AuthController extends Controller {
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login() {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Register user.
     *
     * @param Request $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if($validator->fails()){
            return response()->json(['error' => 'Not registred'], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $cart = Cart::create([
            'user_id' => $user->id,
            'date' => new \DateTime(),
        ]);

        $token = auth()->login($user);
        return $this->respondWithToken($token);
    }

    /**
     * Update user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(['error' => 'Not updated'], 400);
        }
        
        $user = auth()->user();
        $user->name = $request->name;
        $user->address = ($request->address) ? $request->address : $user->address;
        $user->password = ($request->password) ? bcrypt($request->password) : $user->password;
        $user->save();

        $allergens = $request->allergens;
        $table = DB::table('users_allergens');
        $table->where('user_id', '=', $user->id)->delete();
        if($allergens) {
            foreach ($allergens as $key => $value) {
                $table->insert(['user_id' => $user->id, 'allergen_id' => $key]); 
            }
        }

        return response()->json(['success' => 'User updated', 'user' => $user], 200);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me() {
        return response()->json(auth()->user());
    }

    /**
     * Get allergens.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function allergens() {
        $allergens = [];
        $users_allergens = DB::table('users_allergens')->where('user_id', auth()->user()->id)->get();

        foreach ($users_allergens as $allergen) {
            $allergens []= Allergen::find($allergen->allergen_id);
        }
        
        return response()->json($allergens);
    }

    /**
     * Get last cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function lastCart() {
        $allergens = [];
        $users_allergens = Cart::where('user_id', auth()->user()->id)->get();

        foreach ($users_allergens as $allergen) {
            $allergens []= Allergen::find($allergen->allergen_id);
        }
        
        return response()->json($allergens);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}