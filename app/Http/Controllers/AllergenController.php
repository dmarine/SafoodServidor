<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allergen as Allergen;

class AllergenController extends Controller {
    /**
     * Create a new AllergenController instance.
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
        return response()->json(Allergen::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);
        $allergen = Allergen::create($request->all());
        return response()->json($allergen);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Allergen $allergen) {
        return response()->json($allergen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allergen $allergen) {
        $allergen->update($request->all());
        return response()->json($allergen);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allergen $allergen) {
        Allergen::destroy($allergen->id);
        return response()->json($allergen);
    }
}
