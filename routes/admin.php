<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Student\StudentAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClassTransferController;
use App\Http\Controllers\Admin\PasalController;
use App\Http\Controllers\Admin\PoinController;
use App\Http\Controllers\Admin\ReducesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Student\StudentProfileController;

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

Route::resource('permissions', PermissionController::class)->middleware(['role:teacher,admin']);
Route::delete('permissions/{permission}/delete', [PermissionController::class, 'destroy'])->name('permissions.destroy')->middleware(['role:teacher,admin']);

Route::resource('roles', RoleController::class)->middleware(['role:teacher,admin']);
Route::delete('roles/{role}/delete', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware(['role:teacher,admin']);
Route::get('roles/{role}/permissions', [RoleController::class, 'permissions'])->name('roles.permissions')->middleware(['role:teacher,admin']);
Route::post('roles/{role}/permissions', [RoleController::class, 'attachPermissions'])->name('roles.attachPermissions')->middleware(['role:teacher,admin']);

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

// CRUD System
Route::resource('poin', PoinController::class);
Route::get('poins/confirm', [PoinController::class, 'confirmIndex'])->name('poin.confirm.index');
Route::get('poins/confirm/{id}', [PoinController::class, 'confirmPoin'])->name('poin.confirm');
Route::resource('pasal', PasalController::class);

// Pasal Import Excel
Route::post('pasal/import', [PasalController::class, 'PasalImportExcel'])->name('pasal.import');

// Rekap Controller settings
Route::get('/settings/poins-berbintang', [SettingsController::class, 'showPoinBerbintang'])->name('settings.poins-berbintang');
Route::get('/settings/poins-prestasi', [SettingsController::class, 'showPrestasi'])->name('settings.poins-prestasi');
Route::get('/settings/poins-pelanggaran', [SettingsController::class, 'showPelanggaran'])->name('settings.poins-pelanggaran');
Route::get('/settings/poins-siswa', [SettingsController::class, 'showSiswa'])->name('settings.poins-siswa');



Route::resource('students', StudentController::class);
Route::post('students/import', [StudentController::class, 'import'])->name('students.import');

Route::middleware('auth:student')->group(function () {
    Route::get('/complete-profile', [StudentProfileController::class, 'edit'])->name('students.complete.profile');
    Route::post('/complete-profile', [StudentProfileController::class, 'update'])->name('students.update.profile');
});


// Pindah Kelas Route
Route::get('admin/pindahkelas', [ClassTransferController::class, 'index'])->name('admin.pindahkelas.index');
Route::post('admin/pindahkelas', [ClassTransferController::class, 'store'])->name('admin.pindahkelas.store');

//  reduce route
Route::resource('reduces', ReducesController::class);
