<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
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
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/user', 'App\Http\Controllers\HomeController@user')->name('user');
    Route::post('/user/add', 'App\Http\Controllers\HomeController@add_user')->name('add_user');
    Route::get('/delete_user/{id}', 'App\Http\Controllers\HomeController@delete_user')->name('delete_user');

    Route::get('/editUser/{id}', 'App\Http\Controllers\HomeController@editUser')
        ->name('editUser');
    //submit sửa
    Route::post('/updateUser', 'App\Http\Controllers\HomeController@updateUser')
        ->name('updateUser');


