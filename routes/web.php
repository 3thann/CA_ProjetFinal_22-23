<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [GenericsController::class, 'index'])->name("generics.index");
Route::get('/index', [GenericsController::class, 'index'])->name("generics.index");
Route::get('/about', [GenericsController::class, 'about'])->name("generics.about");
Route::get('/reservation', [GenericsController::class, 'reservation'])->name("generics.reservation");
Route::get('/contact', [GenericsController::class, 'contact'])->name("generics.contact");

Route::get('/menu', [RecipeController::class, 'menu'])->name("recipe.menu");
Route::get('/menu/{id}', [RecipeController::class, 'info'])->name("recipe.info");
Route::get('/recipes', [RecipeController::class, 'index'])->middleware(['auth', 'verified'])->name("recipe.index");
Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name("recipe.show");
Route::get('/recipes/create', [RecipeController::class, 'create'])->middleware(['auth', 'verified'])->name("recipe.create");
Route::post('/recipes/store', [RecipeController::class, 'store'])->middleware(['auth', 'verified'])->name("recipe.store");
Route::get('/recipe/{id}/edit', [RecipeController::class, 'edit'])->middleware(['auth', 'verified'])->name("recipe.edit");
Route::put('/recipe/{id}/update', [RecipeController::class, 'update'])->middleware(['auth', 'verified'])->name("recipe.update");
Route::delete('/recipes', [RecipeController::class, 'destroy'])->middleware(['auth', 'verified'])->name("recipe.destroy");

Route::get('/ingredients', [IngredientController::class, 'index'])->middleware(['auth', 'verified'])->name("ingredient.index");
Route::get('/ingredient/{id}', [IngredientController::class, 'show'])->middleware(['auth', 'verified'])->name("ingredient.show");
Route::post('/ingredient/create', [IngredientController::class, 'store'])->middleware(['auth', 'verified'])->name("ingredient.store");
Route::get('/ingredient/{id}/edit', [IngredientController::class, 'edit'])->middleware(['auth', 'verified'])->name("ingredient.edit");
Route::put('/ingredient/{id}/update', [IngredientController::class, 'update'])->middleware(['auth', 'verified'])->name("ingredient.update");
Route::delete('/ingredients', [IngredientController::class, 'destroy'])->middleware(['auth', 'verified'])->name("ingredient.destroy");

Route::get('/connection', [UsersController::class, 'connection'])->name("users.connection");
Route::get('/create-account', [UsersController::class, 'create_account'])->name("users.create_account");
Route::post('/create-account', [UsersController::class, 'store'])->name("users.create");
Route::get('/forgot-password', [UsersController::class, 'forgot_password'])->name("users.forgot_password");
Route::get('/reset-password', [UsersController::class, 'reset_password'])->name("users.reset_password");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
