<?php

namespace App\Http\Controllers;

use App\Models\Food as Food;
use App\Models\Cart as Cart;
use App\Models\Order as Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $foods = [];

        $cart = Cart::where([
            ["user_id","=",auth()->user()->id],
            ["status","=",'1']      
        ])->first();

        $orders = Order::where([
            ["cart_id","=",$cart->id]
        ])->get();
        
        foreach ($orders as $order) {
            $food = Food::where("id", "=", $order->food_id)->first();
            $food->quantity = $order->quantity;
            $foods []= $food;
        }
        
       return response()->json($foods);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'food_id' => 'required',
        ]);
        
        $cart = Cart::where([
            ["user_id", "=", auth()->user()->id],
            ["status", "=", '1']      
        ])->first();

        $order;
        if ($cart){
            $order = Order::where([
                ["cart_id", "=", $cart->id],
                ["food_id", "=", $request->food_id],
            ])->first();
        }

        if ($order) { $order->update(["quantity" => $request->quantity]); 
        } else {
            $order = Order::create(['cart_id' => $cart->id, 'food_id' => $request->food_id, 'quantity' => $request->quantity]);
        }
        
        return response()->json($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order) {
        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order) {
        $order->update($request->all());
        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $request->validate([
            'food_id' => 'required',
        ]);

        $cart = Cart::where([
            ["user_id", "=", auth()->user()->id],
            ["status", "=", '1']      
        ])->first();

        $order = Order::where([
            ["cart_id", "=", $cart->id],
            ["food_id", "=", $request->food_id],
        ])->delete();

        return response()->json($order);
    }
}
