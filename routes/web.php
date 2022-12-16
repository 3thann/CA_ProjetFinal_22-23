<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Burger;

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

Route::get('/index', [Burger::class, 'index'])->name("index");
Route::get('/about', [Burger::class, 'about'])->name("about");
Route::get('/menu', [Burger::class, 'menu'])->name("menu");
Route::get('/reservation', [Burger::class, 'reservation'])->name("reservation");
Route::get('/contact', [Burger::class, 'contact'])->name("contact");
Route::get('/connection', [Burger::class, 'connection'])->name("connection");
Route::get('/create_account', [Burger::class, 'create_account'])->name("create_account");
Route::get('/forgot_password', [Burger::class, 'forgot_password'])->name("forgot_password");
Route::get('/reset_password', [Burger::class, 'reset_password'])->name("reset_password");