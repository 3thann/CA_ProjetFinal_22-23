<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenericsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;

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
Route::get('/reservation', [GenericsController::class, 'reservation'])->name("generics.reservation");
Route::get('/contact', [GenericsController::class, 'contact'])->name("generics.contact");

Route::get('/menu', [RecipeController::class, 'index'])->name("recipe.index");
Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name("recipe.show");
Route::get('/recipe/create', [RecipeController::class, 'create'])->name("recipe.create");
Route::post('/recipe/create', [RecipeController::class, 'store'])->name("recipe.store");
Route::get('/recipe/{id}/edit', [RecipeController::class, 'edit'])->name("recipe.edit");
Route::put('/recipe/{id}/update', [RecipeController::class, 'update'])->name("recipe.update");
Route::delete('/menu', [RecipeController::class, 'destroy'])->name("recipe.destroy");

Route::get('/ingredients', [IngredientController::class, 'index'])->name("ingredient.index");
Route::get('/ingredient/{id}', [IngredientController::class, 'show'])->name("ingredient.show");
Route::post('/ingredient/create', [IngredientController::class, 'store'])->name("ingredient.store");
Route::get('/ingredient/{id}/edit', [IngredientController::class, 'edit'])->name("ingredient.edit");
Route::put('/ingredient/{id}/update', [IngredientController::class, 'update'])->name("ingredient.update");
Route::delete('/ingredients', [IngredientController::class, 'destroy'])->name("ingredient.destroy");

Route::get('/connection', [UsersController::class, 'connection'])->name("users.connection");
Route::get('/create-account', [UsersController::class, 'create_account'])->name("users.create_account");
Route::post('/create-account', [UsersController::class, 'store'])->name("users.create");
Route::get('/forgot-password', [UsersController::class, 'forgot_password'])->name("users.forgot_password");
Route::get('/reset-password', [UsersController::class, 'reset_password'])->name("users.reset_password");