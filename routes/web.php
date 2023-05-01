<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employe\EmployeeController;
use App\Http\Controllers\Employe\EmployeeLeaveController;
use App\Http\Controllers\Employe\EmployeeSettingsController;

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


\Illuminate\Support\Facades\Auth::routes(["register" => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(App\Http\Controllers\Admin\AdminController::class)->group(function () {
    Route::get('/admin', 'index')->name("admin.index");
});
Route::controller(App\Http\Controllers\Admin\AdminEmployeeController::class)->group(function () {
    Route::get('/admin/employes/', "index")->name("admin.employee.index");
    Route::get("admin/employee/create", "create")->name("admin.employee.create");
    Route::post("admin/employee/create", "store")->name("admin.employee.store");
    Route::delete("admin/employee/{id}/delete", "delete")->name("admin.employee.delete");
});
Route::controller(App\Http\Controllers\Admin\AdminAbsenceController::class)->group(function () {
    Route::get("admin/absence", "index")->name("admin.absence.index");
    Route::post("admin/absence/create", "store")->name("admin.absence.store");
});

Route::controller(App\Http\Controllers\Admin\AdminDocumentController::class)->group(function () {
    Route::get('admin/employees/download', "employeeListe")->name("admin.document.employees");
});
Route::controller(App\Http\Controllers\Admin\AdminLeaveController::class)->group(function () {
    Route::get("admin/leave", "index")->name("admin.leave.index");
    Route::post('admin/leave', "store")->name("admin.leave.store");
    Route::get('admin/leaves', "demande")->name("admin.leave.demande");
    Route::put('admin/leave/{id}/accepted', "accepteLeave")->name("admin.leave.accept");
    Route::put('admin/leave/{id}/rejected', "refuseLeave")->name("admin.leave.reject");
});
Route::controller(App\Http\Controllers\Admin\AdminPostController::class)->group(function () {
    Route::get("admin/posts", "index")->name("admin.post.index");
    Route::post('admin/post', "store")->name("admin.post.store");
});

Route::controller(App\Http\Controllers\Admin\AdminStagiaireController::class)->group(function () {
    Route::get('/admin/stagiaires/', "index")->name("admin.stagiaire.index");
    Route::get("admin/stagiaire/create", "create")->name("admin.stagiaire.create");
    Route::post("admin/stagiaire/create", "store")->name("admin.stagiaire.store");
    Route::delete("admin/stagiaire/{id}", "delete")->name("admin.stagiaire.delete");
});

Route::controller(App\Http\Controllers\Admin\AdminProjectController::class)->group(function () {
    Route::get('/admin/projects/', "index")->name("admin.project.index");
    Route::post("admin/project/create", "store")->name("admin.project.store");
    Route::post("/admin/project/createteam", "createTeam")->name('admin.project.createTeam');
    Route::delete("/admin/project/{id}/delete", "delete")->name("admin.project.delete");
});
Route::controller(App\Http\Controllers\Admin\AdminDepartementController::class)->group(function () {
    Route::get('/admin/departements/', "index")->name("admin.departement.index");
    Route::post("admin/departement/create", "store")->name("admin.departement.store");
});


Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employee', 'profile')->name("employee.index");
});

Route::controller(EmployeeLeaveController::class)->group(function () {
    Route::get('/employee/leave', 'index')->name('employee.leave.index');
    Route::post('/employee/leave', 'store')->name('employee.leave.store');
});


Route::controller(EmployeeSettingsController::class)->group(function () {
    Route::get('/employee/settings', 'change_password_index')->name("employe.settings.changepassword_index");
    Route::patch('/employee/settings/changePassword', 'change_password_store')->name('employe.settings.changepassword_store');
});
