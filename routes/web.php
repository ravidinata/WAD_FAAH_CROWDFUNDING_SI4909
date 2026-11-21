<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('campaigns.index'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('campaigns', CampaignController::class)->except(['index', 'show']);
});

Route::resource('campaigns', CampaignController::class)->only(['index', 'show']);
Route::post('/campaigns/{campaign}/donasi', [CampaignController::class, 'donasi'])->name('campaigns.donasi');