<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\CreateClientController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TransbankController;
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

Route::get('/', [GuestController::class, 'index'])->name("landing");
Route::get('product/{product}', [GuestController::class, 'show'])->name('guest.product.show');
Route::get('/Cart', [GuestController::class, 'show_cart'])->name('mostrar_carro');

Route::resource('client', CreateClientController::class)->only(['create', 'store']);

Route::prefix('transbank')->as('transbank.')->group(function () {
    Route::get('payment', [TransbankController::class, 'createdTransaction'])->name('create');
    Route::get('returnUrl', [TransbankController::class, 'commitTransaction'])->name('returnUrl');
});


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


Route::get('/welcome', function (){
    return view('welcome');
});


