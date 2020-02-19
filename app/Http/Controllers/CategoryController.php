<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category as Category;

class CategoryController extends Controller {
    /**
     * Create a new CategoryController instance.
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
        return response()->json(Category::all());
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
        $category = Category::create($request->all());
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category) {
        return response()->json($category);
    }

    /**
     * Count of all categories
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function countCategories(){
        return response()->json(DB::table('categories')->count());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category) {
        $category->update($request->all());
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category) {
        Category::destroy($category->id);
        return response()->json($category);
    }
}
