<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController as DashBoardController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('dashboard',[DashBoardController::class,'index']);
    Route::get('category',[\App\Http\Controllers\Admin\CategoryController::class,'index'])->name('category');
});
