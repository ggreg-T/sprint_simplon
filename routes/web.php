<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\userController;

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

Route::resource('user', userController::class);
Route::resource('home', HomeController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('userTreckView', [HomeController::class, 'userTreckView'])->name('userTreckView');

Route::post('updateStatus/{id}', [userController::class, 'updateStatus'])->name('updateStatus');
Route::get('logReg', [userController::class, 'register'])->name('logReg');
Route::post('register', [userController::class, 'register_action'])->name('register.action');
Route::post('logReg', [userController::class, 'login_action'])->name('login.action');
Route::get('changePersoInfos', [userController::class, 'changeUserInfos'])->name('changeUserInfos');
Route::post('changePersoInfos', [userController::class, 'changeUserInfos_action'])->name('changeUserInfos.action');
Route::get('logout', [userController::class, 'logout'])->name('logout');
Route::get('users', [userController::class, 'users'])->name('users');
Route::get('searchUser', [userController::class, 'searchUser'])->name('searchUser');

