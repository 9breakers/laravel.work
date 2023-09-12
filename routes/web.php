<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\user\RegisterController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\CartController;

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
    Route::get('posts/createPosts', [PostController::class, 'createPosts'])->name('posts.createPosts');
});

Route::middleware(['guest'])->group(function (){
    Route::get('/registration', [RegisterController::class , 'show'])->name('registration');
    Route::post('/registration', [RegisterController::class, 'create']);

    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'create']);


    Route::get('googleauth', [LoginController::class,'redirectGoogle'])->name('googleauth');
    Route::get('googleauth/callback', [LoginController::class,'callbackGoogle']);

    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

});
Auth::routes(['verify'=>true]);
Route::middleware(['verified' ,'auth'])->group(function () {




    Route::get('/pay',[StripeController::class, 'index'])->name('pay');
    Route::post('/pay', [StripeController::class, 'charge']);


    Route::prefix('cart')->group(function () {
        Route::post('/add', [CartController::class, 'addItem'])->name('cart.add');
        Route::post('/remove/{id}', [CartController::class, 'CartRemove'])->name('cart.remove');
        Route::get('/', [CartController::class, 'showCart'])->name('cart');
        Route::get('/count', [CartController::class, 'getCartItemCount'])->name('cart.count');
    });



});
Route::get('/logout',[LogoutController::class, 'logout'])->name('logout');

Route::get ('/' , [HomeController::class , 'index'])->name('home');
Route::get('/popular',[HomeController::class, 'popular'])->name('popular');
Route::get('/posts/{slug}',[HomeController::class, 'show'])->name('posts.show');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
