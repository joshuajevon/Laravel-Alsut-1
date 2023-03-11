<?php

use App\Http\Controllers\BookController;
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
// bad practice
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BookController::class, 'index'])->name('home');

Route::get('/create-book', [BookController::class, 'createBook']);

Route::post('/store-book', [BookController::class, 'storeBook']);

//View Update
Route::get('/update-book/{id}', [BookController::class, 'updateBookView']);

//update data from view
Route::patch('/update/{id}', [BookController::class, 'updateBook']);

//delete data
Route::delete('/delete-book/{id}', [BookController::class, 'deleteBook']);
