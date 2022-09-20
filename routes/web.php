<?php

use App\Http\Controllers\AdminController;

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


//pages route
Route::get('/', [AdminController::class, 'login'])->name('login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('register', [AdminController::class, 'register'])->name('register');
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [AdminController::class, 'profile'])->name('profile');

//functions routes
Route::post('create', [AdminController::class, 'create'])->name('create');
Route::post('checkLogin', [AdminController::class, 'checkLogin'])->name('checkLogin');
Route::get('checkin', [AdminController::class, 'checkin'])->name('checkin');
Route::get('checkout', [AdminController::class, 'checkout'])->name('checkout');
Route::post('updateProfile', [AdminController::class, 'updateProfile'])->name('updateProfile');
Route::post('updatePassword', [AdminController::class, 'updatePassword'])->name('updatePassword');




