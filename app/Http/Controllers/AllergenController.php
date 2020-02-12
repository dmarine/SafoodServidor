<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category as Category;
use App\Models\Allergen as Allergen;
use App\Models\Food as Food;

class AllergenController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response()->json(Allergen::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Allergen $allergen) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);
        $allergen = Allergen::create($request->all());
        return response()->json($allergen);
    }

    /**
     * Display the specified resource.
     *
     * @param  Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Allergen $allergen) {
        return response()->json($allergen);
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
    public function update(Request $request, Allergen $allergen) {
        $allergen->update($request->all());
        return response()->json($allergen);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allergen $allergen) {
        Allergen::destroy($allergen->id);
    }
}
