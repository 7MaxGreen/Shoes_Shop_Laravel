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
    return redirect('/home');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/catalog', [App\Http\Controllers\ShoeController::class, 'index'])-> name('catalog');

Route::post('/catalog',  [App\Http\Controllers\ShoeController::class, 'store']);

Route::view('/dashboard',  'dashboard') -> middleware('auth') -> name('dashboard'); //

Route::view('/create', 'create') -> middleware('auth') -> name('create');

Route::get('/update', [App\Http\Controllers\ShoeController::class, 'edit']) -> middleware('auth') -> name('update');

Route::post('/update', [App\Http\Controllers\ShoeController::class, 'update']) -> middleware('auth');

Route::put('/catalog', [App\Http\Controllers\ShoeController::class, 'save']);

Route::get('/delete', [App\Http\Controllers\ShoeController::class, 'delete']);

Route::get('/delete/{id}', [App\Http\Controllers\ShoeController::class, 'destroy']);

Route::delete('/catalog', [App\Http\Controllers\ShoeController::class, 'deleted']);

Route::post('/sort', [App\Http\Controllers\ShoeController::class, 'sort']) -> middleware('auth');
Route::post('/cart', [App\Http\Controllers\ShoeController::class, 'cart']) -> middleware('auth');

Route::get('/cart', [App\Http\Controllers\ShoeController::class, 'showCart']) -> middleware('auth');

// Route::post('/catalog', 'create') -> middleware('auth') -> name('create');