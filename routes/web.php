<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TradeController;
use Illuminate\Support\Facades\Route;

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


Route::group(['namespace' => '\App\Http\Controllers\Admin', 'prefix' => 'admin'], function(){

    Route::group(['namespace' => '\App\Http\Controllers\Admin\Post'], function(){

        Route::get('/post', 'IndexController')->name('admin.post.index');

        Route::get('/post/create', 'CreateController')->name('admin.post.create');

        Route::post('/post', 'StoreController')->name('admin.post.store');

        Route::get('/post/{post}', 'ShowController')->name('admin.post.show');

        Route::get('/post/{post}/edit', 'EditController')->name('admin.post.edit');

        Route::patch('/post/{post}', 'UpdateController')->name('admin.post.update');

        Route::delete('/post/{post}', 'DestroyController')->name('admin.post.delete');

    });

});




Route::group(['namespace' => 'App\Http\Controllers\Post'], function() {

    Route::get('/posts', 'IndexController')->name('post.index');

    Route::get('/posts/create', 'CreateController')->name('post.create');

    Route::post('/posts', 'StoreController')->name('post.store');

    Route::get('/posts/{post}', 'ShowController')->name('post.show');

    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');

    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');

    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');

});




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





Route::get('/trades', [\App\Http\Controllers\TradeController::class, 'index'])->name('trades');
