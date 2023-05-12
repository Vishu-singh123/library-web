<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('books',[BookController::class, "index"])->name('books');
Route::get('bookdetail/{id}',[BookController::class, "details"])->name('book-details');
Route::get('category',[CategoryController::class, "index"]);
Route::get('review/{id}',[ReviewController::class, "index"])->middleware('auth');
Route::post('review',[ReviewController::class, "reviewstore"])->name('review.store')->middleware('auth');
