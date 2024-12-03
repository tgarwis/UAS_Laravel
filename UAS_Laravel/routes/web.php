<?php

use App\Http\Controllers\Data_MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::get('/mahasiswa', [Data_MahasiswaController::class, 'index'])->name('mahasiswa-index');
Route::get('/mahasiswa/create', [Data_MahasiswaController::class, 'create'])->name("mahasiswa-create")->middleware('auth', 'RoleCheck:admin');
Route::post('/mahasiswa', [Data_MahasiswaController::class,'store'])->name("mahasiswa-store")->middleware('auth', 'RoleCheck:admin');
Route::get('/mahasiswa/{id}', [Data_MahasiswaController::class, 'show'])->name('mahasiswa-detail')->middleware('auth', 'RoleCheck:admin');
Route::get('/mahasiswa/{id}/edit', [Data_MahasiswaController::class, 'edit'])->name('mahasiswa-edit')->middleware('auth', 'RoleCheck:admin');
Route::put('/mahasiswa/{id}', [Data_MahasiswaController::class, 'update'])->name('mahasiswa-update')->middleware('auth', 'RoleCheck:admin');
Route::delete('/mahasiswa/{id}',[Data_MahasiswaController::class,'destroy'])->name('mahasiswa-delete')->middleware('auth', 'RoleCheck:admin');
Route::get('/mahasiswa/export/excel',[Data_MahasiswaController::class, 'exportExcel'])->name('mahasiswa-export')->middleware('auth', 'RoleCheck:admin');