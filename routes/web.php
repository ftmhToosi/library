<?php

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function () {

    Route::get('app', [LibraryController::class, 'app'])->name('app');
    Route::get('manage_library', [LibraryController::class, 'manage_library'])->name('manage-library');
    Route::get('manage_grouping', [LibraryController::class, 'manage_grouping'])->name('manage_grouping');
    Route::get('manage_user', [LibraryController::class, 'manage_user'])->name('manage_user');
    Route::get('manage_message', [LibraryController::class, 'manage_message'])->name('manage_message');
    Route::get('manage_reports', [LibraryController::class, 'manage_reports'])->name('manage_reports');
    Route::get('edit_category/{id}', [LibraryController::class, 'edit_category'])->name('edit_category');
    Route::get('edit_book/{id}', [LibraryController::class, 'edit_book'])->name('edit_book');
    Route::get('login', [LibraryController::class, 'login'])->name('login_admin');

});

Route::get('/register', [LibraryController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/app', [UserController::class , 'app'])->name('app');
Route::get('/show_profile', [UserController::class, 'show_profile'])->name('show_profile');
Route::get('/show_book/{id}', [UserController::class, 'show_book'])->name('show_book');
Route::get('/show_search/{term}', [LibraryController::class, 'show_search'])->name('show_search');

Route::get('/', function (){

});
