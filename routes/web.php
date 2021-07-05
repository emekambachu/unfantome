<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GithubDeploymentController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('about', function () {
    return view('about');
});

Route::get('terms', function () {
    return view('terms-and-conditions');
});

Route::get('legal', function () {
    return view('legal');
});

Route::get('faq', function () {
    return view('faq');
});

Auth::routes();

// Members
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login-form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register-form');
Route::post('register', [RegisterController::class, 'register'])->name('register');

// Admin
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login-form');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');

//Github Deployment
Route::post('github/deploy', [GithubDeploymentController::class, 'deploy']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
