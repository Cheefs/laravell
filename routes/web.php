<?php

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\IndexController as HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\News\IndexController as NewsIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\NewsCategoryController as AdminNewsCategoryController;

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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::name('news.')->prefix('/news')->group(function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/{slug}', [CategoryController::class, 'view'])->name('category.view');

    Route::get('/', [NewsIndexController::class, 'index'])->name('index');
    Route::get('/{news}', [NewsIndexController::class, 'view'])
        ->name('view')
        ->where('id', '[0-9]+');
});

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminIndexController::class, 'index'])->name('index');
        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'test2'])->name('test2');

        Route::resource('news', AdminNewsController::class)->except('show');
        Route::prefix('news')->name('news.')->group(function () {
            Route::resource('category', AdminNewsCategoryController::class)->except('show');
        });
    });
Auth::routes();
