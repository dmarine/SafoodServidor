<?php

namespace App\Http\Controllers;

use App\Models\Cart as Cart;
use App\Models\Order as Order;
use App\Models\Food as Food;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller {
    /**
     * Create a new CartController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api');
        $this->middleware('auth.jwt', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cartOrders = [];
        $foods = [];
        $carts = Cart::where("user_id", "=", auth()->user()->id)->get();

        foreach ($carts as $cart) {
            $cartOrders []= Order::where([
                ["cart_id", "=", $cart->id]
            ])->get();
        }

        foreach ($cartOrders as $orders) {
            foreach ($orders as $order) {
                $food = Food::where("id", "=", $order->food_id)->first();
                $food->quantity = $order->quantity;
                $foods[$order->cart_id] []= $food;
            }
        }
        
       return response()->json($foods);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() {
        $processedCart = Cart::where([
            ["user_id", "=", auth()->user()->id],
            ["status", "=", true]
        ])->update(["status" => false]);


        $cart = Cart::create([
            'user_id' => auth()->user()->id,
            'date' => new \DateTime(),
        ]);

        return response()->json($cart);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart) {
        return response()->json($cart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart) {
        $cart->update($request->all());
        return response()->json($cart);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart) {
        Cart::destroy($cart->id);
        return response()->json($cart);
    }
}
