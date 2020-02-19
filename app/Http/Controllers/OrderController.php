<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order as Order;
use App\Models\Food as Food;
use App\Models\Cart as Cart;

class OrderController extends Controller
{
    /**
     * Create a new OrderController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api');
        $this->middleware('auth.role', ['only' => ['store', 'getOrdersFoodChart', 'update', 'destroy']]);
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
     * Count of all orders
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function countOrders(){
        return response()->json(DB::table('orders')->count());
    }

    /**
     * 
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOrdersFoodChart(){
        return response()->json(DB::table('orders')->join('foods', 'foods.id', '=', 'orders.food_id')
                                                   ->select('foods.name', DB::raw('SUM(quantity) AS CantidadTotal'))
                                                   ->whereBetween('created_at', [date('Y-m-01'), date('Y-m-t')])
                                                   ->groupBy('orders.food_id')->get());
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
