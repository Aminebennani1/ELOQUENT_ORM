<?php

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
