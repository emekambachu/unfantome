<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('packages', function () {
    return view('packages');
});

Route::get('terms', function () {
    return view('terms-of-use');
});

Route::get('legal', function () {
    return view('legal');
});

Route::get('faq', function () {
    return view('faq');
});

Auth::routes();

Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('register', [RegisterController::class, 'showRegistrationForm']);
Route::post('register', [RegisterController::class, 'register'])->name('register');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
