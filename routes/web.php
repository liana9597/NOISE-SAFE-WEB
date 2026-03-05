<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WaitingListController;
use App\Http\Controllers\AuthController;

// Admin Auth
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [PageController::class, 'index'])->name('home');
Route::post('/waiting-list', [WaitingListController::class, 'store'])->name('waiting-list.store');