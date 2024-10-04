<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Http\Request;
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



Route::middleware('guest')->group(function () {
    // register
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register/store', [AuthController::class, 'storeRegister']);
    
    // login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/store', [AuthController::class, 'storeLogin']);
});



Route::middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/tambah', [UserController::class, 'create']);
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/destroy/{user}', [UserController::class, 'destroy']);
    Route::get('/edit/{id}', [UserController::class, 'edit']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::get('/profile', [UserController::class, 'profile']);


    // logout
    Route::get('/logout', [AuthController::class, 'logout']);
});

