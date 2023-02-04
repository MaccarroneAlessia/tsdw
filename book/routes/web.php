<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

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

Route::view('/', 'home');

Route::get('/', function () {
    return view('home');
});


Route::resource('/authors', AuthorController::class);
Route::delete('/authors', [AuthorController::class, 'destroyAll']);

Route::resource('/books', BookController::class);
Route::post('/books/create', [BookController::class, 'help_create']);
Route::delete('/books', [BookController::class, 'destroyAll']);
