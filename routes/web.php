<?php

use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GithubDeploymentController;
use App\Http\Controllers\Members\MemberAccountController;
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

// Members login and logout
Route::get('member/login', [LoginController::class, 'showLoginForm'])->name('login-form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register-form');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('member/logout', [LoginController::class, 'logout'])->name('member.logout');

// Member account
Route::get('member/dashboard', [MemberAccountController::class, 'dashboard'])
    ->name('member.dashboard');
Route::post('member/make-payment', [MemberAccountController::class, 'makePayment'])
    ->name('member.make-payment');
Route::get('member/all-payments', [MemberAccountController::class, 'allPayments'])
    ->name('member.all-payments');
Route::get('member/market-place', [MemberAccountController::class, 'marketPlace'])
    ->name('member.market-place');
Route::get('member/account-settings', [MemberAccountController::class, 'accountSettings'])
    ->name('member.account-settings');
Route::get('member/account-settings/update', [MemberAccountController::class, 'updateAccountSettings'])
    ->name('member.account-settings.update');

// Admin login and logout
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])
    ->name('admin.login-form');
Route::post('admin/login', [AdminLoginController::class, 'login'])
    ->name('admin.login');
Route::post('admin/logout', [AdminLoginController::class, 'logout'])
    ->name('admin.logout');

// Admin account
Route::get('admin/dashboard', [AdminAccountController::class, 'dashboard'])
    ->name('admin.dashboard');
Route::get('admin/payment-plans', [AdminAccountController::class, 'paymentPlans'])
    ->name('admin.payment-plans');
Route::get('admin/manage-users', [AdminAccountController::class, 'manageUsers'])
    ->name('admin.manage-users');
Route::get('admin/market-place', [AdminAccountController::class, 'marketPlace'])
    ->name('admin.market-place');
Route::get('admin/pairings', [AdminAccountController::class, 'pairings'])
    ->name('admin.pairings');
Route::get('admin/account-settings', [AdminAccountController::class, 'accountSettings'])
    ->name('admin.account-settings');


//Github Deployment
Route::post('github/deploy', [GithubDeploymentController::class, 'deploy']);
