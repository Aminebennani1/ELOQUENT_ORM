<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return 'Hello, Laravel!';
});


Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');


Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');