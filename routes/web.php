<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\formController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// user information
Route::get('page/user/profile', [App\Http\Controllers\HomeController::class, 'userProfile'])->name('page/user/profile');


// -----------------------------login-----------------------------------------
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ------------------------------register---------------------------------------
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// -----------------------------forget password ------------------------------
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// -----------------------------reset password ------------------------------
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// -----------------------------form-----------------------------------------
Route::get('form/new', [App\Http\Controllers\formController::class, 'index'])->name('form/new');
Route::post('form/save', [App\Http\Controllers\formController::class, 'save'])->name('form/save');
Route::get('form/view/report', [App\Http\Controllers\formController::class, 'viewReport'])->name('form/view/report');

// Facebook login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

// Google login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// -----------------------------user management-----------------------------------------
Route::get('role/user/view', [App\Http\Controllers\UserManagementController::class, 'index'])->name('role/user/view');
Route::post('role/user/save', [App\Http\Controllers\UserManagementController::class, 'save'])->name('role/user/save');
Route::post('role/user/update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('role/user/update');
Route::get('role/user/view/report', [App\Http\Controllers\UserManagementController::class, 'viewReport'])->name('role/user/view/report');
Route::get('role/delete/{id}', [App\Http\Controllers\UserManagementController::class, 'delete']);


// Product
Route::get('form/product/new', [App\Http\Controllers\ProductController::class, 'product'])->name('form/product/new');
Route::get('form/product/list/new', [App\Http\Controllers\ProductController::class, 'productList'])->name('form/product/list/new');
Route::post('product/list/save', [App\Http\Controllers\ProductController::class, 'productListSave'])->name('product/list/save');
Route::post('product/list/update', [App\Http\Controllers\ProductController::class, 'productListUpdate'])->name('product/list/update');
Route::get('form/product/detail/new', [App\Http\Controllers\ProductController::class, 'productDetail'])->name('form/product/detail/new');
Route::get('form/product/edit/new', [App\Http\Controllers\ProductController::class, 'productEdit'])->name('form/product/edit/new');
Route::get('form/product/card/new', [App\Http\Controllers\ProductController::class, 'productCard'])->name('form/product/card/new');
Route::get('form/credit/card/new', [App\Http\Controllers\ProductController::class, 'creditCard'])->name('form/credit/card/new');

