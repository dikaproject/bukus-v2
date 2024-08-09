<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Student\StudentAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Student\StudentController;

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

Route::resource('permissions', PermissionController::class)->middleware('role:admin');
Route::delete('permissions/{permission}/delete', [PermissionController::class, 'destroy'])->name('permissions.destroy')->middleware('role:admin');

Route::resource('roles', RoleController::class)->middleware('role:admin');
Route::delete('roles/{role}/delete', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware('role:admin');
Route::get('roles/{role}/permissions', [RoleController::class, 'permissions'])->name('roles.permissions')->middleware('role:admin');
Route::post('roles/{role}/permissions', [RoleController::class, 'attachPermissions'])->name('roles.attachPermissions')->middleware('role:admin');

/* admin routes */
Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin_dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin_login');
    Route::post('/login-submit', [AdminAuthController::class, 'login_submit'])->name('admin_login_submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');
});


/* student routes */
Route::middleware('student')->group(function () {
    Route::get('/siswa', [StudentAuthController::class, 'dashboard'])->name('student_dashboard');
});

Route::prefix('siswa')->group(function () {
    Route::get('/login', [StudentAuthController::class, 'login'])->name('student_login');
    Route::post('/login-submit', [StudentAuthController::class, 'login_submit'])->name('student_login_submit');
    Route::post('/logout', [StudentAuthController::class, 'logout'])->name('student_logout');
});


// CRUD Student and Teacher / admin
Route::resource('admins', AdminController::class);
Route::resource('students', StudentController::class);
