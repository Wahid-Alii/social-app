<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminUsersController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function(){
    return view('admin.index');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [AdminUsersController::class, 'create'])->name('users.create');
    Route::post('/admin/users/store', [AdminUsersController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{user}/edit', [AdminUsersController::class, 'edit'])->name('users.edit');
    Route::patch('/admin/users/{user}/update', [AdminUsersController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}/', [AdminUsersController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/post', [PostController::class , 'index'])->name('post');
    Route::get('/post/create', [PostController::class , 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class , 'store'])->name('post.store');
});
