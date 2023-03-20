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
Route::controller(App\Http\Controllers\Admin\AdminEmployeeController::class)->group(function () {
    Route::get('/admin/employes/',"index")->name("admin.employee.index");
    Route::get("admin/employee/create","create")->name("admin.employee.create");
    Route::post("admin/employee/create","store")->name("admin.employee.store");
});
Route::controller(App\Http\Controllers\Admin\AdminAbsenceController::class)->group(function(){
Route::get("admin/absence","index")->name("admin.absence.index");
Route::get("admin/absence/create","create")->name("admin.absence.create");
Route::post("admin/absence/create","store")->name("admin.absence.store");

});

Route::controller(App\Http\Controllers\Admin\AdminDocumentController::class)->group(function(){
    Route::get('admin/employees/download',"employeeListe")->name("admin.document.employees");
});
Route::controller(App\Http\Controllers\Admin\AdminLeaveController::class)->group(function (){
    Route::get("admin/leave","index")->name("admin.leave.index");
    Route::post('admin/leave',"store")->name("admin.leave.store");
});
Route::controller(App\Http\Controllers\Admin\AdminPostController::class)->group(function (){
    Route::get("admin/posts","index")->name("admin.post.index");
    Route::post('admin/post',"store")->name("admin.post.store");
});


