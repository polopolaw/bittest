<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => "App\Http\Controllers"], function(){
    Route::get('books/list/', 'ApiBookAuthorController@list');
    Route::get('books/{book}', 'ApiBookAuthorController@show');
    Route::post('books/update/{book}', 'ApiBookAuthorController@update');
    Route::delete('books/{book}', 'ApiBookAuthorController@delete');
});