<?php

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

Route::get('/', [App\Http\Controllers\AuthController::class, 'index']);
Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'verify'])->name('auth.verify');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
//admin
Route::group(['middleware' =>'auth:admin'],function() {
    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [App\Http\Controllers\Admin\DashBoardController::class, 'index'])->name('admin.dashboard.index');

    });
});
//superadmin
Route::group(['middleware' =>'auth:superadmin'],function() {
    Route::prefix('superadmin')->group(function () {

        Route::get('/dashboard', [App\Http\Controllers\Superadmin\DashBoardController::class, 'index'])->name('superadmin.dashboard.index');

    });
});

