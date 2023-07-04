<?php

use App\Http\Controllers\Api\v1\admin\BookAdminController;
use App\Http\Controllers\Api\v1\admin\CategoryController;
use App\Http\Controllers\Api\v1\admin\MessageController;
use App\Http\Controllers\Api\v1\admin\ReportsController;
use App\Http\Controllers\Api\v1\admin\UsersController;
use App\Http\Controllers\Api\v1\LoginController;
use App\Http\Controllers\Api\v1\user\BookController;
use App\Http\Controllers\Api\v1\user\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->name('Api/v1')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('profile_show/{id}', [ProfileController::class, 'profile_show']);
        Route::put('profile_update/{id}', [ProfileController::class, 'profile_update']);
        Route::get('book_show/{id?}', [BookController::class, 'book_show']);
        Route::post('borrow/{id}', [BookController::class, 'borrow']);
        Route::get('return_book/{id}', [BookController::class, 'return_book']);
        Route::get('book_user_show', [BookController::class, 'book_user_show']);
    });
    Route::prefix('admin')->group(callback: function () {
        Route::apiResource('book', BookAdminController::class);
        Route::apiResource('user', UsersController::class)->except('index');
        Route::get('show_user/{id?}', [UsersController::class, 'show_user']);
        Route::apiResource('category', CategoryController::class);
        Route::apiResource('message', MessageController::class)->except('update');
        Route::get('reports_book', [ReportsController::class, 'reports_book_count']);
        Route::get('reports_user', [ReportsController::class, 'reports_user']);
    });
        Route::post('login', [LoginController::class, 'login']);
        Route::post('register', [LoginController::class, 'register']);
});
