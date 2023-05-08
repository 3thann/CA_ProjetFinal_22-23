<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenericsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [GenericsController::class, 'index'])->name("generics.home");
Route::get('/home', [GenericsController::class, 'index'])->name("generics.home");
Route::get('/about', [GenericsController::class, 'about'])->name("generics.about");
Route::get('/reservation', [GenericsController::class, 'reservation'])->name("generics.reservation");
Route::get('/contact', [ContactController::class, 'index'])->name("contact.index");
Route::post('/contact/store', [ContactController::class, 'store'])->name("contact.store");


Route::get('/menu', [RecipeController::class, 'menu'])->name("recipe.menu");


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [GenericsController::class, 'dashboard'])->name('dashboard');


    Route::get('/recipes', [RecipeController::class, 'index'])->name("recipe.index");
    Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name("recipe.show");
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name("recipe.create");
    Route::post('/recipes/store', [RecipeController::class, 'store'])->name("recipe.store");
    Route::get('/recipe/{id}/edit', [RecipeController::class, 'edit'])->name("recipe.edit");
    Route::put('/recipe/{id}/update', [RecipeController::class, 'update'])->name("recipe.update");
    Route::delete('/recipes', [RecipeController::class, 'destroy'])->name("recipe.destroy");


    Route::get('/ingredients', [IngredientController::class, 'index'])->name("ingredient.index");
    Route::get('/ingredient/{id}', [IngredientController::class, 'show'])->name("ingredient.show");
    Route::post('/ingredient/create', [IngredientController::class, 'store'])->name("ingredient.store");
    Route::get('/ingredient/{id}/edit', [IngredientController::class, 'edit'])->name("ingredient.edit");
    Route::put('/ingredient/{id}/update', [IngredientController::class, 'update'])->name("ingredient.update");
    Route::delete('/ingredients', [IngredientController::class, 'destroy'])->name("ingredient.destroy");


    Route::get('/contact/show', [ContactController::class, 'show'])->name("contact.show");


    Route::get('/users', [UsersController::class, 'index'])->name("users.index");
    Route::post('/users/change_role', [UsersController::class, 'change_role'])->name("users.change_role");

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/connection', [UsersController::class, 'connection'])->name("users.connection");
Route::get('/create-account', [UsersController::class, 'create_account'])->name("users.create_account");
Route::post('/create-account', [UsersController::class, 'store'])->name("users.create");
Route::get('/forgot-password', [UsersController::class, 'forgot_password'])->name("users.forgot_password");
Route::get('/reset-password', [UsersController::class, 'reset_password'])->name("users.reset_password");


require __DIR__.'/auth.php';