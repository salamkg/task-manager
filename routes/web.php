<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\RegisterContoller;
use App\Http\Controllers\Backend\HomeContoller;
use App\Http\Controllers\Backend\LoginContoller;
use App\Http\Controllers\Front\Task\TaskController;

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
Route::get('login', [\App\Http\Controllers\Front\LoginContoller::class, 'loginForm'])->name('frontend.auth.form');
Route::post('login', [\App\Http\Controllers\Front\LoginContoller::class, 'login'])->name('frontend.auth.login');
Route::get('register', [RegisterContoller::class, 'registerForm'])->name('frontend.auth.registration');
Route::post('register', [RegisterContoller::class, 'register'])->name('frontend.auth.register');
Route::get('/', [\App\Http\Controllers\Front\HomeController::class, 'index'])->name('frontend.home');

Route::middleware(['frontend.middleware:frontend'])->group(function () {
//    Route::get('/', [\App\Http\Controllers\Front\HomeController::class, 'index'])->name('frontend.home');
    Route::get('logout', [\App\Http\Controllers\Front\LoginContoller::class, 'logout'])->name('frontend.auth.logout');
    Route::get('task', [TaskController::class, 'create'])->name('frontend.task.form');
    Route::post('task', [TaskController::class, 'store'])->name('frontend.task.create');

});

Route::prefix('admin')->group(function () {
    Route::get('login', [LoginContoller::class, 'loginForm'])->name('backend.auth.form');
    Route::post('login', [LoginContoller::class, 'login'])->name('backend.auth.login');

});
Route::group(
    ['prefix' => 'admin',
        'middleware' => 'backend.middleware:backend',
        'as' => 'backend.',
    ],
    function () {
        Route::get('/', [HomeContoller::class, 'index'])->name('home');
        Route::get('task/{id}', [\App\Http\Controllers\Backend\TaskController::class, 'edit'])->name('task.edit');
        Route::patch('task/update/{id}', [\App\Http\Controllers\Backend\TaskController::class, 'update'])->name('task.update');
        Route::get('logout', [LoginContoller::class, 'logout'])->name('backend.auth.logout');
});
