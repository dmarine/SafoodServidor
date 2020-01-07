<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allergen as Allergens;

class AllergensController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response()->json(Allergens::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Allergens $allergens) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);
        $allergens = Allergens::create($request->all());
        return response()->json($allergens);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Allergens $allergens) {
        return response()->json($allergens);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allergens $allergens) {
        $allergens->update($request->all());
        return response()->json($allergens);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allergens $allergens) {
        Allergens::destroy($allergens->id);
    }
}
