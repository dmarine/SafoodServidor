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
Route::group(['middleware' => 'api'], function() {
    Route::get('categories/{idCategory}/foods','FoodController@findByCategory');
    Route::get('allergens/{idAllergen}/foods','FoodController@findByAllergen');
    Route::get('foods/{idFood}/allergens','FoodController@allergens');
    Route::get('food/random','FoodController@random');
    Route::get('count/restaurants', 'RestaurantController@countRestaurants');
    Route::get('count/categories', 'CategoryController@countCategories');
    Route::get('count/orders', 'OrderController@countOrders');
    Route::get('count/users','AuthController@countUsers');
    Route::get('stats/orders', 'OrderController@getOrdersFoodChart');
    Route::get('stats/users', 'AuthController@usersRegisteredMonth');
    Route::resources([
        'restaurants' => 'RestaurantController',
        'foods' => 'FoodController',
        'categories' => 'CategoryController',
        'allergens' => 'AllergenController',
        'carousel' => 'CarouselController',
        'users' => 'UserController',
    ]);
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function() {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('update-avatar','AuthController@updateAvatar');
    Route::post('allergens','AuthController@allergens');
    Route::put('update','AuthController@update');
    Route::delete('orders', 'OrderController@destroy');
    Route::resources([
        'cart' => 'CartController',
        'orders' => 'OrderController',
    ]);
});