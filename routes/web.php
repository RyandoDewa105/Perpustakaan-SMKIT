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

Route::get('/', function () {
    return view('welcome');
});

Route::get('tentang', function () {
    return view('tentang');
});

Route::get('welcome', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// buku
Route::get('/buku', [App\Http\Controllers\BukuController::class, 'index'])->name('buku');
Route::post('/buku', [App\Http\Controllers\BukuController::class, 'store'])->name('TambahBuku');


