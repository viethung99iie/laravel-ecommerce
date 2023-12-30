<?php

use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::post('login', [AuthController::class,'login'])->name('auth.login');
Route::get('logout', [AuthController::class,'logout'])->name('auth.logout');
Route::get('admin', [AuthController::class,'index'])->name('auth.admin')->middleware('login');

Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('admin');


Route::group(['prefix'=> 'user'],function(){
Route::get('users/index', [UserController::class,'index'])->name('users.index');
Route::get('users/create', [UserController::class,'create'])->name('users.create');
Route::post('users/store', [UserController::class,'store'])->name('users.store');

})->middleware('admin');

Route::get('ajax/location/getLocation', [LocationController::class,'getLocation'])->name('ajax.location.getLocation');