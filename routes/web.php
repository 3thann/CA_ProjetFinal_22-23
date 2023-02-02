<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenericsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MenuController;

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

Route::get('/', [GenericsController::class, 'index'])->name("generics.index");
Route::get('/index', [GenericsController::class, 'index'])->name("generics.index");
Route::get('/about', [GenericsController::class, 'about'])->name("generics.about");
Route::get('/menu', [MenuController::class, 'menu'])->name("menu.menu");
Route::get('/menu/{id}', [MenuController::class, 'recipe'])->name("menu.recipe");
Route::get('/create-recipe', [MenuController::class, 'create_recipe'])->name("menu.create_recipe");
Route::post('/create-recipe', [MenuController::class, 'store'])->name("menu.create");
Route::get('/reservation', [GenericsController::class, 'reservation'])->name("generics.reservation");
Route::get('/contact', [GenericsController::class, 'contact'])->name("generics.contact");
Route::get('/connection', [UsersController::class, 'connection'])->name("users.connection");
Route::get('/create-account', [UsersController::class, 'create_account'])->name("users.create_account");
Route::post('/create-account', [UsersController::class, 'store'])->name("users.create");
Route::get('/forgot-password', [UsersController::class, 'forgot_password'])->name("users.forgot_password");
Route::get('/reset-password', [UsersController::class, 'reset_password'])->name("users.reset_password");