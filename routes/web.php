<?php

use App\Http\Controllers\ManajerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


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

Route::get('/', function() {
    return view('welcome');
} )->name('home')->middleware('auth');
Route::get('/administrator', function() { return view('homes.administrator'); } )->name('home.administrator');
Route::get('/manajer', function() { return view('homes.manajer'); } )->name('home.manajer');
Route::get('/gudang', function() { return view('homes.gudang'); } )->name('home.gudang');
Route::get('/purchasing', function() { return view('homes.purchasing'); } )->name('home.purchasing');
Route::get('/staff', function() { return view('homes.staff'); } )->name('home.staff');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::get('/manajer/eoq', [ManajerController::class, 'eoq'])->name('manajer.eoq');
    Route::get('/manajer/rop', [ManajerController::class, 'rop'])->name('manajer.rop');
});
