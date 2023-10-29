<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController as DashBoardController;
use \App\Http\Controllers\Admin\CategoryController as CategoryController;
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
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashBoardController::class, 'index']);

    Route::controller(CategoryController::class)->group(function () {

        Route::get('category',  'index')->name('category');
        Route::get('category/create',  'create')->name('category.create');
        Route::post('category/store',  'store')->name('category.store');
        Route::get('category/{category}/edit',  'edit')->name('category.edit');
        Route::put('category/{category}',  'update')->name('category.update');
        Route::get('category/{category}/delete',  'delete')->name('category.delete');
    });
    Route::get('brands',\App\Http\Livewire\Admin\Brand\Index::class)->name('brands.index');
});
