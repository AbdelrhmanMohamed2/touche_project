<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
// use App\Http\Controllers\ChefController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
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

Route::get('admin/login', [LoginController::class, 'loginPage'])->name('admin.login')->middleware('guest');
Route::post('admin/loginForm', [LoginController::class, 'login'])->name('admin.loggingForm');

Route::prefix('admin')->middleware(['auth', 'IsAdmin'])->group(function () {

    Route::name('admin.')->group(function () {


        Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
            Route::get('/', 'index')->name('all');

            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::post('/update/{user}', 'update')->name('update');
            Route::get('/edit/{user}', 'edit')->name('edit');
            Route::delete('/delete/{user}', 'destroy')->name('destroy');
        });

        Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function () {

            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::post('/update/{user}', 'update')->name('update');
            Route::get('/edit/{user}', 'edit')->name('edit');
            Route::delete('/delete/{user}', 'destroy')->name('destroy');
        });

        Route::post('login', [LoginController::class, 'logout'])->name('logout');

        Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
        Route::get('/messages', [AdminDashboardController::class, 'showMessages'])->name('messages.index');
        Route::delete('/messages/{message}', [AdminDashboardController::class, 'destroyMessage'])->name('messages.destroy');
    });

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('chefs', ChefController::class);
});


Route::controller(HomeController::class)->name('home.')->group(function () {

    Route::get('/', 'index')->name('index');
    Route::get('/chefs', 'chefs')->name('chefs');
    Route::get('/menu', 'menu')->name('menu');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact/send', 'message')->name('message');
});
