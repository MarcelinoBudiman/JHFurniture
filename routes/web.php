<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\TransactionController;
use App\Models\Furniture;

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

//HOME
Route::get('/', [HomeController::class, 'createPage']);
Route::get('/home', [HomeController::class, 'createPage']);

//UPDATE
Route::get('/login', [LoginController::class, 'createPage'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'storeSession']);
Route::post('/logout', [LoginController::class, 'destroySession']);
Route::get('/register', [RegisterController::class, 'createPage'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'storeUser']);

//PROFILE
Route::get('/profile/{id}', [UserController::class, 'viewProfile'])->middleware('auth');
Route::get('/update-profile/{id}', [UpdateController::class, 'createPage'])->middleware('auth');
Route::post('/update-profile-user/{id}', [UpdateController::class, 'updateUser'])->middleware('auth');
Route::post('/update-profile-admin/{id}', [UpdateController::class, 'updateAdmin'])->middleware('auth');

//FURNITURE
Route::get('/view', [FurnitureController::class, 'createViewPage']);
Route::get('/search', [FurnitureController::class, 'searchFurniture']);
Route::get('/detail/{id}', [FurnitureController::class, 'createDetailPage']);
Route::get('/update-furniture-page/{id}', [FurnitureController::class, 'createUpdatePage'])->middleware('auth');
Route::post('/update-furniture/{id}', [FurnitureController::class, 'updateFurniture'])->middleware('auth');
Route::delete('/delete-furniture/{id}', [FurnitureController::class, 'deleteFurniture'])->middleware('auth');
Route::get('/add-furniture-page', [FurnitureController::class, 'createAddPage'])->middleware('auth');
Route::post('/insert-furniture', [FurnitureController::class, 'insertFurniture'])->middleware('auth');

//CART
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->middleware('auth');
Route::get('/reduce-cart/{id}', [CartController::class, 'reduceQty'])->middleware('auth');
Route::get('/cart', [CartController::class, 'createCartPage'])->middleware('auth');
Route::get('/checkout', [CartController::class, 'createCheckoutPage'])->middleware('auth');

//TRANSACTION
Route::post('/add-to-transaction', [CartController::class, 'insertTransaction'])->middleware('auth');
Route::get('/detail-transaction/{id}', [TransactionController::class, 'transactionHistory'])->middleware('auth');
