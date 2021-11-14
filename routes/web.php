<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\GuestController;
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

Route::get('/', [GuestController::class, 'index']);


Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::resource('products', ProductController::class)->except('show');
    Route::resource('transactions', TransactionController::class)
        ->only(['index', 'show']);
});

Route::get('/posts', function () {
    return view('posts.index');
});

require __DIR__.'/auth.php';
