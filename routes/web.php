<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;





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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/send-mail', [SendEmailController::class,'index'])->name('kirim-email');
    Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user}/resize', [UserController::class, 'resizeForm'])->name('users.resizeForm');
    Route::post('/users/{user}/resize', [UserController::class, 'resizeImage'])->name('resizeImage');
    Route::resource('gallery', GalleryController::class);
    Route::get('/gallery/{id}/edit', 'GalleryController@edit')->name('gallery.edit');
    Route::delete('/gallery/{id}', 'GalleryController@destroy')->name('gallery.destroy');
    Route::post('/logout', 'logout')->name('logout');
   });

   
   
