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

Route::post('register',[
    'uses' => 'UserController@createUser',
    'as' => 'user.register'
]);

//changeStatus
Route::post('Report',[
    'uses' => 'ResponseController@getReport',
    'as' => 'response.getReport'
]);   
//changeStatus
Route::post('editProduct',[
    'uses' => 'ProductController@updateProduct',
    'as' => 'product.updateProduct'
]);   

Route::post('deleteProduct',[
    'uses' => 'ProductController@deleteProduct',
    'as' => 'product.deleteProduct'
]);   

Route::apiResource('/products','ProductController');
Route::apiResource('/responses','ResponseController');