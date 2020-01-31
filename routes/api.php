<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resources([
    'restaurants' => 'RestaurantController',
    'foods' => 'FoodController',
    'categories' => 'CategoryController',
    'allergens' => 'AllergenController',
    'carousel' => 'CarouselController',
]);

Route::get('categories/{idCategory}/foods','FoodController@findByCategory');
Route::get('allergens/{idAllergen}/foods','FoodController@findByAllergen');
Route::get('foods/{idFood}/allergens','FoodController@allergens');
Route::get('food/random','FoodController@random');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function() {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::put('update','AuthController@update');
    
    Route::post('allergens','AuthController@allergens');
    Route::delete('orders', 'OrderController@destroy');
    Route::resources([
        'cart' => 'CartController',
        'orders' => 'OrderController',
    ]);
});