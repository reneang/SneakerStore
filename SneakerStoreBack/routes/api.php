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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'user'], function() {
    Route::post('/signup', 'UserController@SignUp');
    Route::post('/signin', 'UserController@SignIn');
});

Route::group(['prefix' => 'product'], function() {
    
    Route::get('/getallproduct', 'ProductController@GetAllProduct');
    //->middleware('jwt.auth');
    Route::post('/saveproductimage', 'ProductController@SaveProductImage');
    Route::get('/getproductbyid', 'ProductController@GetProductById');

});

