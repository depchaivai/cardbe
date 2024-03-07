<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AdminController;

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
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/dashboard/submitted', function () {
    return view('submitted');
});
Route::get('/dashboard/home', function () {
    return view('home');
});
Route::post('/dashboard/images/upload', [ImageController::class, 'uploadImages'])->name('images.upload');
Route::post('/dashboard/info/update', [AdminController::class, 'updateInfo'])->name('info.upload');
Route::get('/', function () {
    return view('welcome');
});
