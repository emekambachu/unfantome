<?php

use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AdminInvestmentController;
use App\Http\Controllers\Admin\AdminMarketPlaceController;
use App\Http\Controllers\Admin\AdminPairingController;
use App\Http\Controllers\Admin\AdminPaymentPlanController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GithubDeploymentController;
use App\Http\Controllers\Members\MemberAccountController;
use App\Http\Controllers\Members\MemberMarketPlaceController;
use App\Models\PaymentPlan;
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

    $paymentPlans = PaymentPlan::all();
    return view('home', compact('paymentPlans'));
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
Route::get('member/account-settings', [MemberAccountController::class, 'accountSettings'])
    ->name('member.account-settings');
Route::post('member/account-settings/update', [MemberAccountController::class, 'updateAccountSettings'])
    ->name('member.account-settings.update');

// Member Payments
Route::post('member/make-payment', [MemberAccountController::class, 'makePayment'])
    ->name('member.make-payment');
Route::get('member/all-payments', [MemberAccountController::class, 'allPayments'])
    ->name('member.all-payments');
Route::post('member/cancel-payment/{id}', [MemberAccountController::class, 'cancelPayment'])
    ->name('member.cancel-payment');
Route::post('member/confirm-payment/{id}', [MemberAccountController::class, 'confirmPayment'])
    ->name('member.confirm-payment');
Route::post('member/approve-payment/{id}', [MemberAccountController::class, 'approvePayment'])
    ->name('member.approve-payment');

// Member Marketplace
Route::get('member/market-place', [MemberMarketPlaceController::class, 'index'])
    ->name('member.market-place');
Route::get('member/market-place/latest-products', [MemberMarketPlaceController::class, 'latestProducts'])
    ->name('member.market-place.latest-products');
Route::get('member/market-place/my-products', [MemberMarketPlaceController::class, 'myProducts'])
    ->name('member.market-place.my-products');
Route::get('member/market-place/create', [MemberMarketPlaceController::class, 'create'])
    ->name('member.market-place.create');
Route::post('member/market-place/store', [MemberMarketPlaceController::class, 'store'])
    ->name('member.market-place.store');
Route::get('member/market-place/edit/{id}', [MemberMarketPlaceController::class, 'edit'])
    ->name('member.market-place.edit');
Route::put('member/market-place/update/{id}', [MemberMarketPlaceController::class, 'update'])
    ->name('member.market-place.update');
Route::delete('member/market-place/delete/{id}', [MemberMarketPlaceController::class, 'delete'])
    ->name('member.market-place.delete');

// Admin login and logout
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])
    ->name('admin.login-form');
Route::post('admin/login', [AdminLoginController::class, 'login'])
    ->name('admin.login');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])
    ->name('admin.logout');

// Admin account
Route::get('admin/dashboard', [AdminAccountController::class, 'dashboard'])
    ->name('admin.dashboard');
Route::get('admin/manage-users', [AdminAccountController::class, 'manageUsers'])
    ->name('admin.manage-users');
Route::post('admin/approve-user/{id}', [AdminAccountController::class, 'approveUser'])
    ->name('admin.approve-user');
Route::delete('admin/delete-user/{id}', [AdminAccountController::class, 'deleteUser'])
    ->name('admin.delete-user');
Route::get('admin/{id}/make-receiver', [AdminAccountController::class, 'makeReceiver'])
    ->name('admin.make-receiver');
Route::post('admin/make-receiver/{id}/invest', [AdminAccountController::class, 'makeReceiverInvest'])
    ->name('admin.make-receiver.invest');

// Admin Settings
Route::get('admin/account-settings', [AdminAccountController::class, 'accountSettings'])
    ->name('admin.account-settings');
Route::post('admin/account-settings/update', [AdminAccountController::class, 'updateAccountSettings'])
    ->name('admin.account-settings.update');

// Admin Investments
Route::get('admin/investments', [AdminInvestmentController::class, 'index'])
    ->name('admin.investments.index');
Route::delete('admin/investment/{id}/delete', [AdminInvestmentController::class, 'delete'])
    ->name('admin.investment.delete');
Route::get('admin/manage-payments', [AdminAccountController::class, 'managePayments'])
    ->name('admin.manage-payments');

// Admin pairing
Route::get('admin/pairings', [AdminPairingController::class, 'pairings'])
    ->name('admin.pairings');
Route::post('admin/pair-users', [AdminPairingController::class, 'pairUsers'])
    ->name('admin.pair-users');
Route::delete('admin/pairing/{id}/delete', [AdminPairingController::class, 'delete'])
    ->name('admin.pairing.delete');

// Admin Payment Plans
Route::get('admin/payment-plans', [AdminPaymentPlanController::class, 'index'])
    ->name('admin.payment-plans');
Route::post('admin/payment-plan/store', [AdminPaymentPlanController::class, 'storePaymentPlan'])
    ->name('admin.payment-plan.store');
Route::get('admin/payment-plan/edit/{id}', [AdminPaymentPlanController::class, 'editPaymentPlan'])
    ->name('admin.payment-plan.edit');
Route::put('admin/payment-plan/update/{id}', [AdminPaymentPlanController::class, 'updatePaymentPlan'])
    ->name('admin.payment-plan.update');
Route::delete('admin/payment-plan/delete/{id}', [AdminPaymentPlanController::class, 'deletePaymentPlan'])
    ->name('admin.payment-plan.delete');

// Admin Market Place
Route::get('admin/market-place', [AdminMarketPlaceController::class, 'index'])
    ->name('admin.market-place');
Route::post('admin/market-place/approve/{id}', [AdminMarketPlaceController::class, 'approve'])
    ->name('admin.market-place.approve');
Route::delete('admin/market-place/delete/{id}', [AdminMarketPlaceController::class, 'deleteProduct'])
    ->name('admin.market-place.delete-product');

//Github Deployment
Route::post('github/deploy', [GithubDeploymentController::class, 'deploy']);
