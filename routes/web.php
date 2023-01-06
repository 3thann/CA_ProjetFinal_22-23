<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BurgerController;
use App\Http\Controllers\UsersController;

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

Route::get('/', [BurgerController::class, 'index'])->name("index");
Route::get('/index', [BurgerController::class, 'index'])->name("index");
Route::get('/about', [BurgerController::class, 'about'])->name("about");
Route::get('/menu', [BurgerController::class, 'menu'])->name("menu");
Route::get('/reservation', [BurgerController::class, 'reservation'])->name("reservation");
Route::get('/contact', [BurgerController::class, 'contact'])->name("contact");
Route::get('/connection', [BurgerController::class, 'connection'])->name("connection");
Route::get('/create_account', [BurgerController::class, 'create_account'])->name("create_account");
Route::post('/create_account', [UsersController::class, 'store'])->name("store");
Route::get('/forgot_password', [BurgerController::class, 'forgot_password'])->name("forgot_password");
Route::get('/reset_password', [BurgerController::class, 'reset_password'])->name("reset_password");