<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\Main\IndexController::class, 'index'])->name('home');

Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => "App\Http\Controllers\Admin"], function(){
    Route::redirect('/', 'admin/books/list/');
    Route::get('books/list/', 'ListBooksController@index');
    Route::get('authors/list/', 'ListAuthorsController@index');
    Route::resource('books', BookController::class);
    Route::resource('authors', AuthorController::class);
});

