<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ControllerView;
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

// * PUBLIC PAGE * //
// * FIRST LANDING PAGE * //
Route::get('/', [ControllerView::class, 'login'])->name('index-login');

// * CHECK IF THE EMAIL AND PASSWORD IS TRUE * //
Route::post('/a/check', [AdminController::class, 'check'])->name('admin-check');

// * ROUTE FOR ADMIN * //
Route::group(['middleware' => ['isAdmin']], function() {
    Route::get('/a', [ControllerView::class, 'index'])->name('admin-index');
    Route::get('/a/logout', [AdminController::class, 'logout'])->name('admin-logout');
    Route::post('/a/saved', [AdminController::class, 'store'])->name('admin-store');
});



