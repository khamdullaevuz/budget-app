<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::redirect('/', '/home');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('categories', CategoryController::class);
    Route::controller(TransactionController::class)->prefix('transactions')->as('transactions.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });


    Route::get('category/{type}/type', [CategoryController::class, 'getCategoriesByType'])->name('category.type');

    /*Route::controller(ProfileController::class)->name('profile')->as('profile')->group(function(){
       Route::get('/', 'index');
       Route::post('/update', 'update');
       Route::get('/password', 'password');
       Route::post('/password', 'passwordChange');
    });*/
});
