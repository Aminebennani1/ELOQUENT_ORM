<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth');

Route::get('/adminlte-test', function () {
    return view('adminlte::page');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('articles', ArticleController::class);
});

// Route::resource('articles', controller: ArticleController::class);

Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::get('/home', [ArticleController::class, 'home'])->name('home');