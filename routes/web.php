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
})->name('home');

\Illuminate\Support\Facades\Auth::routes(["register"=>false]);
Route::get("/register",[\App\Http\Controllers\Auth\RegisterController::class,"register"])->name("register");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post("/register",[\App\Http\Controllers\Auth\RegisterController::class,"create"]);
Route::controller(App\Http\Controllers\Admin\AdminController::class)->group(function () {
    Route::get('/admin', 'index')->name("admin.index");
});
