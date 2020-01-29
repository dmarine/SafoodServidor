<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food as Food;
use App\Models\Category as Category;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response()->json(Food::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Food $food) {
        $request->validate([
            'id' => 'required',
            'Nombre' => 'required',
        ]);
        $food = Food::create($request->all());
        return response()->json($food);
    }

    /**
     * Display the specified resource.
     *
     * @param  Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food) {
        return response()->json($food);
    }

    /**
     * Display the specified resource by category.
     *
     * @param  int  $idCategory
     * @return \Illuminate\Http\Response
     */
    public function findByCategory(int $idCategory) {
        return response()->json(Food::where('category_id', $idCategory)->get());
    }

    /**
     * Display the specified resource by allergen.
     *
     * @param  int  $idCategory
     * @return \Illuminate\Http\Response
     */
    public function findByAllergen(int $idAllergen) {
        $foods = [];
        $foods_allergens = DB::table('foods_allergens')->where('allergen_id', $idAllergen)->get();

        foreach ($foods_allergens as $food) {
            $foods []= Food::find($food->id);
        }
        
        return response()->json($foods);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food) {
        $food->update($request->all());
        return response()->json($food);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food) {
        Food::destroy($food->id);
    }
}
