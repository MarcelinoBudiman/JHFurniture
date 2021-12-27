<?php

use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'createPage'])->middleware('guest');
Route::post('/login', [LoginController::class, 'storeSession']);
Route::get('/register', [RegisterController::class, 'createPage']);
Route::post('/register', [RegisterController::class, 'storeUser']);

Route::get('/home', [HomeController::class, 'createPage'])->middleware('auth');

Route::get('/view', [FurnitureController::class, 'createViewPage']);
Route::get('/update-furniture-page/{id}', [FurnitureController::class, 'createUpdatePage']);
Route::post('/update-furniture/{id}', [FurnitureController::class, 'updateFurniture']);
Route::delete('/delete-furniture/{id}', [FurnitureController::class, 'deleteFurniture']);
