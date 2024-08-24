<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::get('admin', function () {
    return 'Admin Page';
})->middleware(['auth', 'verified', 'role:admin']);

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

Route::get('datapoin', function () {
    return view('poin.index');
});

Route::get('/siswa', function () {
    return view('student.dashboard');
});

Route::get('/pasalll', function () {
return view('student.pasal.index');
});

Route::get('/reloadpoin', function () {
    $student = \App\Models\Student::find(1);
    $student->updatePointsAndStars();
});
