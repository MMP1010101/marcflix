<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'intro'])->name('intro');
Route::get('/profiles', [PortfolioController::class, 'profile'])->name('profile');
Route::get('/home', [PortfolioController::class, 'home'])->name('home');
Route::get('/api/search', [PortfolioController::class, 'search'])->name('search');
