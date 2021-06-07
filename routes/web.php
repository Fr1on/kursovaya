<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AuthCheck;
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

Route::get('', [MainController::class, 'home'])->name('main');
Route::get('about', [MainController::class, 'about']);
//PRODUCT//////
Route::get('product', [ProductController::class, 'Product']);
Route::get('addproduct', [ProductController::class, 'addProduct']);
Route::post('addProductData', [ProductController::class, 'addProductData']);
Route::get('detail/{id}', [ProductController::class, 'detail']);
Route::get('search', [ProductController::class, 'search']);
Route::post('add_to_cart', [ProductController::class, 'addToCart']);
Route::get('cartlist', [ProductController::class, 'cartlist']);
Route::get('removecart/{id}', [ProductController::class, 'removeCart']);

//LOGIN///////
Route::get('login', [UserAuthController::class, 'login'])->name('login.route')
    ->middleware('AlreadyLoggedIn');
Route::get('registration', [UserAuthController::class, 'registration'])->name('registration.route')
    ->middleware('AlreadyLoggedIn');
Route::post('create', [UserAuthController::class, 'create'])->name('auth.create');
Route::post('check',[UserAuthController::class, 'check'])->name('auth.check');
Route::get('profile',[UserAuthController::class, 'profile'])->middleware('auth')->name('profile.route');
Route::get('logout',[UserAuthController::class, 'logout'])->name('logout.route');
Route::get('edit/{id}', [UserAuthController::class, 'showData']);
Route::post('edit', [UserAuthController::class,'update'])->name('edit.route');
Route::get('delete/{id}', [UserAuthController::class,'delete']);

/*/ORDER/////////////////////////////////////////////////////////////////////*/
Route::get("ordernow",[ProductController::class,'orderNow']);

