<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WaitingListController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::post('/waiting-list', [WaitingListController::class, 'store'])->name('waiting-list.store');