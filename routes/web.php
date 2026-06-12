<?php

use App\Http\Controllers\LatihanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\KeyController;


use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Cara simpel, usenya dipanggil di awal biar ga input ulang dan panjang
Route::get('latihan', [LatihanController::class, 'index']);
Route::get('tambah', [LatihanController::class, 'tambah'])->name('tambah');
Route::get('kurang', [LatihanController::class, 'kurang'])->name('kurang');
Route::get('kali', [LatihanController::class, 'kali'])->name('kali');
Route::get('bagi', [LatihanController::class, 'bagi'])->name('bagi');


// Route::get('bagi',[LatihanController::class, 'bagi']);
// setelah get ini berisi directing website, yang terakhir itu class yang ada di controller
// contoh 'bagi' yang awal itu website, dan 'bagi' yang terakhir itu class yang dibuat dari function yang ada di file LatihanController

// Cara yang panjang
// Route::get('latihan',[App\Http\Controllers\LatihanController::class, 'index']);

Route::post('action-tambah', [LatihanController::class, 'actionTambah'])->name('action-tambah');
Route::post('action-kurang', [LatihanController::class, 'actionKurang'])->name('action-kurang');
Route::post('action-kali', [LatihanController::class, 'actionKali'])->name('action-kali');
Route::post('action-bagi', [LatihanController::class, 'actionBagi'])->name('action-bagi');

// Profiles
Route::get('profile', [ProfileController::class, 'index']);



// Buat Templating Website Baru


// Route::get('dashboard',[LoginController::class, 'app'])->name('app');

// login
Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('action-login', [LoginController::class, 'actionLogin'])->name('action-login');
Route::post('action-logout', [LoginController::class, 'actionLogout'])->name('action-logout');

// dashboard
// Route::get('dashboard', function () {
//     return view('dashboard.index');
// })->middleware(['auth', 'nocache'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    // Didalam Resource terdapat GET, POST, PUT, DELETE, PATCH
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('role', \App\Http\Controllers\RoleController::class);

    Route::resource('locker', \App\Http\Controllers\LockerController::class);
    Route::resource('major', \App\Http\Controllers\MajorController::class);
    Route::resource('key', \App\Http\Controllers\KeyController::class);
    Route::resource('student', \App\Http\Controllers\StudentController::class);
    Route::resource('instructor', \App\Http\Controllers\InstructorController::class);

    Route::resource('menu', \App\Http\Controllers\MenuController::class);
    Route::resource('user-role', \App\Http\Controllers\UserRoleController::class);
});
