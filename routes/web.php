<?php

use App\Http\Controllers\Admin\CategoryGroupController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\CategoryController;
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
Route::get('/Category/{group}', [GuestController::class, 'show_category'])->name('mostrar_categoria');
// Links footer
Route::view('/mediosDePago', 'posts\mediosDePago')->name('mediosDePago');
Route::view('/comoComprar', 'posts\comoComprar')->name('comoComprar');
Route::view('/envios', 'posts\envios')->name('envios');

Route::resource('client', CreateClientController::class)->only(['create', 'store']);

Route::prefix('transbank')->as('transbank.')->group(function () {
    Route::get('payment', [TransbankController::class, 'createdTransaction'])->name('create');
    Route::any('returnUrl', [TransbankController::class, 'commitTransaction'])->name('returnUrl');
    Route::view('thanks', 'webpayplus.transaction_committed')->name('finished');
});

Route::get('boleta/{buy_order}', function (string $buy_order){
    $transaction = \App\Models\Transaction::where('buy_order', $buy_order)
        ->where('was_payed', TRUE)
        ->with(['client', 'products'])
        ->firstOrFail();

    return (new \App\Services\InvoiceService())->create($transaction->client, $transaction);
})->name('boleta');

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::resource('products', ProductController::class)->except('show');
    Route::resource('transactions', TransactionController::class)->only(['index', 'show']);
    Route::resource('groups', CategoryGroupController::class)->except(['create', 'show']);
    Route::resource('categories', CategoryController::class)->except(['index', 'create', 'show']);
});

Route::get('/posts', function () {
    return view('posts.index');
});

require __DIR__.'/auth.php';


Route::get('/welcome', function (){
    return view('welcome');
});

Route::get('/search', [GuestController::class, 'search'])->name("search");


