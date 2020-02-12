<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Carousel as Carousel;

class CarouselController extends Controller {
=======
<<<<<<< HEAD:app/Http/Controllers/AllergensController.php
use App\Models\Allergen as Allergen;

class AllergenController extends Controller {
=======
use App\Models\Carousel as Carousel;

class CarouselController extends Controller {
>>>>>>> develop:app/Http/Controllers/CarouselController.php
>>>>>>> develop
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
<<<<<<< HEAD
        return response()->json(Carousel::all());
=======
<<<<<<< HEAD:app/Http/Controllers/AllergensController.php
        return response()->json(Allergen::all());
=======
        return response()->json(Carousel::all());
>>>>>>> develop:app/Http/Controllers/CarouselController.php
>>>>>>> develop
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function store(Carousel $carousel) {
=======
<<<<<<< HEAD:app/Http/Controllers/AllergensController.php
    public function store(Allergen $allergen) {
=======
    public function store(Carousel $carousel) {
>>>>>>> develop:app/Http/Controllers/CarouselController.php
>>>>>>> develop
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);
<<<<<<< HEAD
        $carousel = Carousel::create($request->all());
        return response()->json($carousel);
=======
<<<<<<< HEAD:app/Http/Controllers/AllergensController.php
        $allergen = Allergen::create($request->all());
        return response()->json($allergen);
=======
        $carousel = Carousel::create($request->all());
        return response()->json($carousel);
>>>>>>> develop:app/Http/Controllers/CarouselController.php
>>>>>>> develop
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function show(Carousel $carousel) {
        return response()->json($carousel);
=======
<<<<<<< HEAD:app/Http/Controllers/AllergensController.php
    public function show(Allergen $allergen) {
        return response()->json($allergen);
=======
    public function show(Carousel $carousel) {
        return response()->json($carousel);
>>>>>>> develop:app/Http/Controllers/CarouselController.php
>>>>>>> develop
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Request $request, Carousel $carousel) {
        $carousel->update($request->all());
        return response()->json($carousel);
=======
<<<<<<< HEAD:app/Http/Controllers/AllergensController.php
    public function update(Request $request, Allergen $allergen) {
        $allergen->update($request->all());
        return response()->json($allergen);
=======
    public function update(Request $request, Carousel $carousel) {
        $carousel->update($request->all());
        return response()->json($carousel);
>>>>>>> develop:app/Http/Controllers/CarouselController.php
>>>>>>> develop
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function destroy(Carousel $carousel) {
        Carousel::destroy($carousel->id);
=======
<<<<<<< HEAD:app/Http/Controllers/AllergensController.php
    public function destroy(Allergen $allergen) {
        Allergen::destroy($allergen->id);
=======
    public function destroy(Carousel $carousel) {
        Carousel::destroy($carousel->id);
>>>>>>> develop:app/Http/Controllers/CarouselController.php
>>>>>>> develop
    }
}
