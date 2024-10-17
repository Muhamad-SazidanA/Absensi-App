<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\DataGuruController;
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
    return view('sidebar');
});

// Route di Sidebar
Route::get('/', [DashboardController::class, 'index'])->name('welcome');

// Route dalam data absen murid
Route::get('/FormSiswa', [DataSiswaController::class, 'index'])->name('datamurid.siswa_index');
Route::get('/FormSiswa/Add', [DataSiswaController::class, 'create'])->name('datamurid.siswa_add');
Route::post('/FormSiswa/Add', [DataSiswaController::class, 'store'])->name('datamurid.siswa_add.store');
Route::get('/FormSiswa/edit/{id}', [DataSiswaController::class, 'edit'])->name('datamurid.siswa_edit');
Route::patch('/Formsiswa/edit/{id}',[DataSiswaController::class,'update'])->name('datamurid.edit.update');
Route::delete('/FormSiswa/delete/{id}', [DataSiswaController::class, 'destroy'])->name('datamurid.siswa_delete');

// Route dalam data absen guru
Route::get('/FormGuru', [DataGuruController::class, 'index'])->name('dataguru.guru_index');
Route::get('/FormGuru/Add', [DataGuruController::class, 'create'])->name('dataguru.guru_add');
Route::post('/FormGuru/Add', [DataGuruController::class, 'store'])->name('dataguru.guru_add.store');
Route::get('/FormGuru/edit/{id}', [DataGuruController::class, 'edit'])->name('dataguru.guru_edit');
Route::patch('/FormGuru/edit/{id}',[DataGuruController::class,'update'])->name('dataguru.edit.update');
Route::delete('/FormGuru/delete/{id}', [DataGuruController::class, 'destroy'])->name('dataguru.guru_delete');
