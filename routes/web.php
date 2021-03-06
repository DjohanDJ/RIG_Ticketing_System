<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BinusianController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
})->middleware('auth');

Route::group(["middleware" => "authenticated"], function () {
    /**
     * Route buat SuperAdmin
     */
    Route::group(["middleware" => "superadmin:SuperAdmin"], function () {
        Route::get('/super-admin-home', [CategoryController::class, 'getAllCategory']);
        Route::get('/insert-category', [CategoryController::class, 'getInsertCategoryPage']);
        Route::post('/insert-category-page', [CategoryController::class, 'insertCategory']);
        Route::post('/delete-category/{id}', [CategoryController::class, 'deleteCategory']);
        Route::get('/update-category/{id}', [CategoryController::class, 'getUpdateCategoryPage']);
        Route::post('/update-category/{id}', [CategoryController::class, 'updateCategory']);
    });
    /**
     * Route buat Binusian
     */
    Route::group(["middleware" => "superadmin:Student"], function () {
        Route::get('/binusian-home', [BinusianController::class, 'getAllTicket']);
        Route::get('/insert-ticket', [BinusianController::class, 'getInsertTicketPage']);
        Route::post('/insert-ticket', [BinusianController::class, 'insertTicket']);
        Route::get('/detail-tickets/{id}', [BinusianController::class, 'detailTicket']);
        Route::post('/insert-reply/{id}', [BinusianController::class, 'replyTicket']);
    });
    /**
     * Route buat admin
     */
    Route::group(["middleware" => "superadmin:Admin"], function () {
        Route::get('/admin-home/{categoryName}/{status}', [AdminController::class, 'getAdminPage']);
        Route::get('/detail-tickets/{id}/{status}', [AdminController::class, 'detailTicket']);
        Route::post('/insert-reply-admin/{id}', [AdminController::class, 'replyTicket']);
        Route::post('/close-ticket/{id}', [AdminController::class, 'closeTicket']);
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'loginBimay']);
