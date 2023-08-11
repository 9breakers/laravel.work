<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\user\RegisterController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
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


Route::middleware(['admin'])->group(function (){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::resource('/tags', TagController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/post', PostController::class);
});

Route::middleware(['guest'])->group(function (){
    Route::get('/registration', [RegisterController::class , 'show'])->name('registration');
    Route::post('/registration', [RegisterController::class, 'create']);

    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'create']);

});

Route::get('/logout',[LogoutController::class, 'logout'])->name('logout');


Route::get ('/' , [HomeController::class , 'index'])->name('home');
