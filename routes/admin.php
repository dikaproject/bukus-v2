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
use App\Http\Controllers\Admin\ExportSystemController;

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

Route::resource('permissions', PermissionController::class)->middleware(['role:admin']);
Route::delete('permissions/{permission}/delete', [PermissionController::class, 'destroy'])->name('permissions.destroy')->middleware(['role:admin']);

Route::resource('roles', RoleController::class)->middleware(['role:admin']);
Route::delete('roles/{role}/delete', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware(['role:admin']);
Route::get('roles/{role}/permissions', [RoleController::class, 'permissions'])->name('roles.permissions')->middleware(['role:admin']);
Route::post('roles/{role}/permissions', [RoleController::class, 'attachPermissions'])->name('roles.attachPermissions')->middleware(['role:admin']);

/* admin routes */
Route::middleware('check.role:admin,leader,teacher,walas')->group(function () {
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin_dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin_login');
    Route::post('/login-submit', [AdminAuthController::class, 'login_submit'])->name('admin_login_submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');
});


/* student routes */
Route::middleware(['student'])->group(function () {
    Route::get('/student/dashboard', [StudentAuthController::class, 'dashboard'])->name('student.dashboard');
    // Add other routes that require student authentication here
});



Route::prefix('siswa')->group(function () {
    Route::get('/login', [StudentAuthController::class, 'login'])->name('student_login');
    Route::post('/login-submit', [StudentAuthController::class, 'login_submit'])->name('student_login_submit');
    Route::post('/logout', [StudentAuthController::class, 'logout'])->name('student_logout');

    // pasal view siswa ( untuk siswa bisa melihat pasal yang ada )
    Route::get('/pasal', [StudentAuthController::class, 'pasal'])->name('student.pasal');
    // about view siswa ( untuk siswa bisa melihat tentang aplikasi )
    Route::get('/about', [StudentAuthController::class, 'about'])->name('student.about');
});


// CRUD Student and Teacher / admin
Route::resource('admins', AdminController::class)->middleware('check.role:admin,leader,teacher,walas');

// CRUD System
Route::resource('poin', PoinController::class)->middleware('check.role:admin,leader,teacher,walas');
Route::get('poins/confirm', [PoinController::class, 'confirmIndex'])->name('poin.confirm.index')->middleware('check.role:admin,leader,teacher,walas');
Route::get('poins/confirm/{id}', [PoinController::class, 'confirmPoin'])->name('poin.confirm')->middleware('check.role:admin,leader,teacher,walas');
Route::get('poins/cancel/{id}', [PoinController::class, 'cancelPoin'])->name('poin.cancel')->middleware('check.role:admin,leader,teacher,walas');
Route::resource('pasal', PasalController::class)->middleware('check.role:admin,leader,teacher,walas');

// Pasal Import Excel
Route::post('pasal/import', [PasalController::class, 'PasalImportExcel'])->name('pasal.import')->middleware('check.role:admin,leader,teacher,walas');

// Rekap Controller settings
Route::get('/settings/poins-berbintang', [SettingsController::class, 'showPoinBerbintang'])->name('settings.poins-berbintang')->middleware('check.role:admin,leader,teacher,walas');
Route::get('/settings/poins-prestasi', [SettingsController::class, 'showPrestasi'])->name('settings.poins-prestasi')->middleware('check.role:admin,leader,teacher,walas');
Route::get('/settings/poins-pelanggaran', [SettingsController::class, 'showPelanggaran'])->name('settings.poins-pelanggaran')->middleware('check.role:admin,leader,teacher,walas');
Route::get('/settings/poins-siswa', [SettingsController::class, 'showSiswa'])->name('settings.poins-siswa')->middleware('check.role:admin,leader,teacher,walas');



Route::resource('students', StudentController::class)->middleware('check.role:admin,leader,teacher,walas');
Route::post('students/{id}/reset-password', [StudentController::class, 'resetPassword'])->name('students.reset-password');
Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');
Route::get('/students/check', [StudentController::class, 'checkName'])->name('students.check');
Route::post('students/import', [StudentController::class, 'import'])->name('students.import')->middleware('check.role:admin,leader,teacher,walas');
// student detail
Route::get('students/{student}/detail', [StudentController::class, 'detail'])->name('students.detail')->middleware('check.role:admin,leader,teacher,walas');

Route::middleware('auth:student')->group(function () {
    Route::get('/complete-profile', [StudentProfileController::class, 'edit'])->name('students.complete.profile');
    Route::post('/complete-profile', [StudentProfileController::class, 'update'])->name('students.update.profile');
});


// Pindah Kelas Route
Route::get('admin/pindahkelas', [ClassTransferController::class, 'index'])->name('admin.pindahkelas.index')->middleware('check.role:admin,leader,teacher,walas');
Route::post('admin/pindahkelas', [ClassTransferController::class, 'store'])->name('admin.pindahkelas.store')->middleware('check.role:admin,leader,teacher,walas');

//  reduce route
Route::resource('reduces', ReducesController::class)->middleware('check.role:admin,leader,teacher,walas');

// export data excel
Route::get('/export-prestasi',  [ExportSystemController::class, 'exportPrestasi'])->name('export.prestasi');
Route::get('/export-berbintang', [ExportSystemController::class, 'exportBerbintang'])->name('export.berbintang');
Route::get('/export-pelanggaran', [ExportSystemController::class, 'exportPelanggaran'])->name('export.pelanggaran');
Route::get('/export-students', [ExportSystemController::class, 'exportStudents'])->name('export.students');


