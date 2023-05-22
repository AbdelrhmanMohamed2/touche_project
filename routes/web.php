<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ProductController;
// use App\Http\Controllers\ChefController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;

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

Route::prefix('admin')->group(function(){

    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.index');
    Route::get('/messages', [AdminDashboardController::class, 'showMessages'])->name('admin.messages.index');
    Route::delete('/messages/{message}', [AdminDashboardController::class, 'destroyMessage'])->name('admin.messages.destroy');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('chefs', ChefController::class);

});


Route::controller(HomeController::class)->group(function(){

    Route::get('/', 'index')->name('home.index');
    Route::get('/chefs', 'chefs')->name('home.chefs');
    Route::get('/menu', 'menu')->name('home.menu');
    Route::get('/gallery', 'gallery')->name('home.gallery');
    Route::get('/contact', 'contact')->name('home.contact');
    Route::post('/contact/send', 'message')->name('home.message');



});
