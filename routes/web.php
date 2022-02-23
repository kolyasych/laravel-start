<?php

use App\Http\Controllers\HomeController;
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

use App\Http\Controllers\TestPostController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Category\CategoryController;


//Route::get('/', function () {
//    return view('welcome');
//});


//Route::get('/posts', [TestPostController::class, 'index']);
//
//Route::get('/posts/create', [TestPostController::class, "create"]);
//
//Route::get('/posts/update', [TestPostController::class, 'update']);
//
//Route::get('/posts/first_or_create', [TestPostController::class, 'firstOrCreate']);
//
//Route::get('/posts/update_or_create', [TestPostController::class, 'updateOrCreate']);
//
//Route::get('posts/delete', [TestPostController::class, 'delete']);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'admin'], function () {
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');

    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');

    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('posts/{post}', [PostController::class, 'update'])->name('posts.update');

    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});


    Route::post('filter/search', [PostController::class, 'search'])->name('posts.search');




    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('category/{category}/edit', [CategoryController::class , 'edit'])->name('category.edit');
Route::patch('category/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
