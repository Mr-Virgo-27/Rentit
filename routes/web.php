<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RentApplicationController;
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

Route::get('/',[PagesController::class, 'index'])->name('fpage');
Route::get('/cars',[PagesController::class, 'cars'])->name('cars');
Route::get('/userDashboard',[PagesController::class, 'member'])->name('my-dashboard');
Route::get('/terms',[PagesController::class, 'terms'])->name('terms');
Route::get('/about-us',[PagesController::class, 'about'])->name('about-us');
Route::get('/contact',[PagesController::class, 'contact'])->name('contact');
Route::get('/car-details/{id}',[PagesController::class, 'details'])->name('car-details');
Route::get('/more-details/{id}',[PagesController::class, 'moreDetails'])->name('more-details');
Route::post('/car-details',[RentApplicationController::class, 'apply'])->name('apply');
Route::get('/admin/addCar',[PagesController::class, 'add'])->name('add')->middleware('is_admin');
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

