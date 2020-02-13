<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Restaurant as Restaurant;

class RestaurantController extends Controller {
    /**
     * Create a new RestaurantController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth.role', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response()->json(Restaurant::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'id' => 'required',
            'Nombre' => 'required',
        ]);
        $restaurant = Restaurant::create($request->all());
        return response()->json($restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant) {
        return response()->json($restaurant);
    }

    /**
     * Count of all restaurants
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function countRestaurants(){
        return response()->json(DB::table('restaurants')->count());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant) {
        $restaurant->update($request->all());
        return response()->json($restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant) {
        Restaurant::destroy($restaurant->id);
    }
}
