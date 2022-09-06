<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth'], function() {
    Route::prefix('auth')->group(function() {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('logout', [AuthController::class, 'logout']);
    });

    Route::prefix('products')->group(function() {
        Route::get('', [ProductController::class, 'list']);
        Route::post('create', [ProductController::class, 'create']);
        Route::get('{id}', [ProductController::class, 'detail']);
        Route::put('edit/{id}', [ProductController::class, 'edit']);
        Route::delete('delete/{id}', [ProductController::class, 'delete']);
    });
});
