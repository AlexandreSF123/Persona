<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

Route::prefix('/guest')->group(function(){
Route::get('/index', [App\Http\Controllers\GuestController::class, 'index'])->name('guest.index');
Route::post('/add', [App\Http\Controllers\GuestController::class, 'add'])->name('guest.add');
Route::get('/remove/{id}', [App\Http\Controllers\GuestController::class, 'remove'])->name('guest.remove');
Route::get('/update/{id}', [App\Http\Controllers\GuestController::class, 'update'])->name('guest.update');
Route::post('/save', [App\Http\Controllers\GuestController::class, 'save'])->name('guest.save');
});

Route::prefix('/suspect')->group(function(){
    Route::get('/index', [App\Http\Controllers\Suspect::class, 'suspect']);
    Route::post('/add', [App\Http\Controllers\Suspect::class, 'suspect']);
    Route::get('/remove/{id}', [App\Http\Controllers\Suspect::class, 'suspect']);
    Route::get('/update/{id}', [App\Http\Controllers\Suspect::class, 'suspect']);
    Route::post('/save', [App\Http\Controllers\Suspect::class, 'suspect']);
    });

