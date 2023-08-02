<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\TradeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return 'aaaaaaaaaaaaaa';

});

Route::get('/posts', [PostController::class, 'index'])->name('post.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');

Route::post('/posts', [PostController::class, 'store'])->name('post.store');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');

Route::patch('/posts/{post}', [PostController::class, 'update'])->name('post.update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.delete');

//------------------------------------------------------------------------------

Route::get('/trades', [TradeController::class, 'index'])->name('trade.index');

Route::get('/trades/create', [TradeController::class, 'create'])->name('trade.create');

Route::post('/trades', [TradeController::class, 'store'])->name('trade.store');

Route::get('/trades/{trade}', [TradeController::class, 'show'])->name('trade.show');

Route::get('/trades/{trade}/edit', [TradeController::class, 'edit'])->name('trade.edit');

Route::patch('/trades/{trade}', [TradeController::class, 'update'])->name('trade.update');

Route::delete('/trades/{trade}', [TradeController::class, 'destroy'])->name('trade.destroy');









Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contact.index');
Route::get('/main', [MainController::class, 'index'])->name('main.index');





Route::get('/trades', [\App\Http\Controllers\TradeController::class, 'index'])->name('trades');
