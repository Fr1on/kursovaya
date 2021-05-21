<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserAuthController;
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
Route::get('login', [UserAuthController::class, 'login'])->name('login.route')
    ->middleware('AlreadyLoggedIn');
Route::get('registration', [UserAuthController::class, 'registration'])->name('registration.route')
    ->middleware('AlreadyLoggedIn');
Route::post('create', [UserAuthController::class, 'create'])->name('auth.create');
Route::post('check',[UserAuthController::class, 'check'])->name('auth.check');
Route::get('profile',[UserAuthController::class, 'profile'])->middleware('auth')->name('profile.route');
Route::get('logout',[UserAuthController::class, 'logout'])->name('logout.route');
Route::get('edit/{id}', [UserAuthController::class, 'showData']);


