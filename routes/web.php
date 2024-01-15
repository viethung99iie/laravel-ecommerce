<?php

use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserCatalogueController;
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
Route::get('/', [AuthController::class,'index'])->name('auth.admin')->middleware('login');

Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('admin');


Route::group(['prefix'=> 'user/'],function(){
    Route::get('index', [UserController::class,'index'])->name('user.index');
    Route::get('create', [UserController::class,'create'])->name('user.create');
    Route::post('store', [UserController::class,'store'])->name('user.store');
    Route::get('edit/{id}', [UserController::class,'edit'])->where(['id'=>'[0-9]+'])->name('user.edit');
    Route::post('update/{id}', [UserController::class,'update'])->name('user.update');
    Route::get('delete/{id}', [UserController::class,'delete'])->where(['id'=>'[0-9]+'])->name('user.delete');
     Route::delete('destroy/{id}', [UserController::class,'destroy'])->name('user.destroy');
})->middleware('admin');

Route::group(['prefix'=> 'user/catalogue/'],function(){
    Route::get('index', [UserCatalogueController::class,'index'])->name('user.catalogue.index');
    Route::get('create', [UserCatalogueController::class,'create'])->name('user.catalogue.create');
    Route::post('store', [UserCatalogueController::class,'store'])->name('user.catalogue.store');
    Route::get('edit/{id}', [UserCatalogueController::class,'edit'])->where(['id'=>'[0-9]+'])->name('user.catalogue.edit');
    Route::post('update/{id}', [UserCatalogueController::class,'update'])->name('user.catalogue.update');
    Route::get('delete/{id}', [UserCatalogueController::class,'delete'])->where(['id'=>'[0-9]+'])->name('user.catalogue.delete');
     Route::delete('destroy/{id}', [UserCatalogueController::class,'destroy'])->name('user.catalogue.destroy');
})->middleware('admin');


// AJAX
Route::get('ajax/location/getLocation', [LocationController::class,'getLocation'])->name('ajax.location.getLocation');
Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class,'changeStatus'])->name('ajax.dashboard.changeStatus');
Route::post('ajax/dashboard/changeStatusAll', [AjaxDashboardController::class,'changeStatusAll'])->name('ajax.dashboard.changeStatusAll');
