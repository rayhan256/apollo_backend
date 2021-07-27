<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortfolioController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware(['guest:admin']);

Route::prefix('cms')->middleware(['auth', 'verified'])->group(function () {
    //dashboard
    Route::get('/', [DashboardController::class, 'index']);
    Route::post('/createTask', [DashboardController::class, 'createTask'])->name('createTask');
    Route::post('/updateTask/{id}', [DashboardController::class, 'updateTask']);
    Route::get('/deleteTask/{id}', [DashboardController::class, 'deleteTask']);

    // articles
    Route::get('/articles', [ArticleController::class, 'index']);
    Route::get('/articles/create', [ArticleController::class, 'addView'])->name('createView');
    Route::post('/articles/create', [ArticleController::class, 'add'])->name('addArticle');
    Route::get('/articles/{id}', [ArticleController::class, 'viewArticle']);
    Route::get('/articles/update/{id}', [ArticleController::class, 'updateView']);
    Route::post('/articles/update', [ArticleController::class, 'update'])->name('updateArticle');
    Route::get('/articles/delete/{id}', [ArticleController::class, 'destroy']);

    // portfolio
    Route::get('/portfolios', [PortfolioController::class, 'index']);
    Route::get('/portfolios/update/{id}', [PortfolioController::class, 'edit']);
    Route::post('/portfolios/update', [PortfolioController::class, 'update']);
    Route::get('/portfolios/create', [PortfolioController::class, 'create'])->name('createPortfolio');
    Route::post('/portfolios/create', [PortfolioController::class, 'store']);
    Route::get('/portfolios/{id}', [PortfolioController::class, 'viewPortfolio']);
    Route::post('/portfolios/addImage', [PortfolioController::class, 'addImage']);
    Route::get('/portfolios/destroy/{id}', [PortfolioController::class, 'destroy']);

    //logout
    Route::get('/logout', [DashboardController::class, 'signout']);
});
