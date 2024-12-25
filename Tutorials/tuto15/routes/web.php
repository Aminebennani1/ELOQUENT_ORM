<?php

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::middleware(RoleMiddleware::class . ':admin')->group(function () {
    Route::get('/admin', function () {
        return 'Admin Dashboard';
    });
});

Route::middleware(RoleMiddleware::class . ':editor')->group(function () {
    Route::get('/editor', function () {
        return 'Editor Dashboard';
    });
});


Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    return 'Bienvenue sur le tableau de bord.';
})->middleware('permission:view dashboard');

Route::get('/manage', function () {
    return 'Gestion des ressources.';
})->middleware('permission:view dashboard,manage resources');

Route::get('/admin', function () {
    return 'Bienvenue sur la page admin.';
})->middleware('role:admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
