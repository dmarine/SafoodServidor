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
Route::get('allergens/{idAllergens}/foods','FoodController@findByAllergen');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function() {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});