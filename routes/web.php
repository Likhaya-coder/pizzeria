<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ItemController;

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
    return view('index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/redirects', [OrderController::class, 'authUser'])->name('redirects');

/* ----------------------------Orders-------------------------------*/
Route::group(['middleware' => 'manager', 'prefix' => 'orders'], function() {
    Route::get('/', [OrderController::class, 'index'])->name('orders');
    Route::get('show/{id}', [OrderController::class, 'show']);
    Route::get('/search', [OrderController::class, 'search'])->name('searchOrder');
    Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('editOrder');
    Route::post('/updated', [OrderController::class, 'update'])->name('updateOrder');
    Route::get('/delete/{id}', [OrderController::class, 'destroy'])->name('deleteOrder');
    Route::get('/approve/{id}', [OrderController::class, 'approve']);
    Route::get('/cancel/{id}', [OrderController::class, 'cancel']);
});

Route::group(['middleware' => 'admin', 'prefix' => 'users'], function() {
    Route::get('/', [UserController::class, 'index'])->name('users');
    Route::get('/users/delete/{id}', [UserController::class, 'destroy']);
    Route::get('/item', [ItemController::class, 'create']);
    Route::post('/item/store', [ItemController::class, 'store'])->name('storeItem');
});

Route::post('/orders/store/', [OrderController::class, 'store'])->name('storeOrder');
Route::view('/orders/gallery/', 'gallery');
Route::view('/orders/contact/', 'contact');
Route::view('/orders/about/', 'about');
Route::get('/myOrders', [OrderController::class, 'myOrders'])->name('myOrders');
Route::get('/user/order/action/{id}', [OrderController::class, 'userAction']);

/* -------------------------------News-------------------------------*/
Route::group(['middleware' => 'publisher', 'prefix' => 'news'], function() {
    Route::view('create', 'news.create')->name('createNews');
    Route::post('save', [NewsController::class, 'store'])->name('storeNews');
    Route::get('posts', [NewsController::class, 'posts'])->name('RemoveNewsPosts');
    Route::get('delete/{id}', [NewsController::class, 'destroy'])->name('deleteNews');
});

Route::view('/orders/server/error', '/errors/802');
Route::get('/orders/news/', [NewsController::class, 'index']);
//Route::get('search', [NewsController::class, 'search'])->name('searchNews');
