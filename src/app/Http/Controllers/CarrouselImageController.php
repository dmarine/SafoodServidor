<?php

namespace App\Http\Controllers;

use App\carrouselImage;
use Illuminate\Http\Request;

class CarrouselImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(carrousel_images::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\carrouselImage  $carrouselImage
     * @return \Illuminate\Http\Response
     */
    public function show(carrouselImage $carrouselImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\carrouselImage  $carrouselImage
     * @return \Illuminate\Http\Response
     */
    public function edit(carrouselImage $carrouselImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\carrouselImage  $carrouselImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carrouselImage $carrouselImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\carrouselImage  $carrouselImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(carrouselImage $carrouselImage)
    {
        //
    }
}
