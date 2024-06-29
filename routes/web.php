<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\DataDiriController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminPostController;
use App\Livewire\PostLike;
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

// ======= User Controller ======

Route::get('/', function(){
    return view('/home');
});
Route::controller(UserController::class)->group(function(){
    // ====== user
    Route::get('/home', [UserController::class, 'index']);
    Route::middleware(['auth'])->group(function () {
        Route::get('/', 'index');
        Route::get('/detail/{user}', 'detail');
        Route::get('dataSiswa','dataSiswa');
        Route::get('/dashboard/dataDiri', 'dataDiri');
        Route::put('dashboard/dataDiri', 'update')->name('datadiri.edit');
        Route::put('dashboard/dataImage', 'updateImage')->name('datadiri.image');
        Route::get('/dashboard/dataImage', 'dataImage');
    });
});
// ===== Admin ======
Route::middleware(['admin'])->group(function () {

        Route::resource('/dashboard/absen', AbsenController::class);
        Route::resource('/dashboard/adminPost',AdminPostController::class );
});

Route::resource('/dashboard/user', adminController::class);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::resource('/dashboard/post', PostController::class);

// Halaman Petugas
Route::resource('/dashboard/petugas', PetugasController::class )->middleware('admin')->middleware('petugas');
Route::post('/dashboard/petugas/pesan', [PetugasController::class , 'pesan'])->name('petugas.pesan')->middleware('petugas')->middleware('admin');
Route::get('/dashboard/dataAbsen', [PetugasController::class, 'dataAbsen'])->middleware('auth');
Route::get('/dashboard/data', [PetugasController::class, 'data']);
Route::get('/dashboard/chart', [PetugasController::class, 'chart']);

Route::delete('/absen/{absen}', [AbsenController::class, 'hapus'])->name('absen.destroy');
Route::get('/dashboard/dataPengunjung', [adminController::class, 'index']);
Route::get('/dashboard/dataUser', [UserController::class, 'dataUser']);




