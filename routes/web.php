<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('/guest')->group(function(){
Route::get('/index', [App\Http\Controllers\Guest::class, 'guest']);
Route::post('/add', [App\Http\Controllers\Guest::class, 'guest']);
Route::get('/remove/{id}', [App\Http\Controllers\Guest::class, 'guest']);
Route::get('/update/{id}', [App\Http\Controllers\Guest::class, 'guest']);
Route::post('/save', [App\Http\Controllers\Guest::class, 'guest']);
});

Route::prefix('/suspect')->group(function(){
    Route::get('/index', [App\Http\Controllers\Suspect::class, 'suspect']);
    Route::post('/add', [App\Http\Controllers\Suspect::class, 'suspect']);
    Route::get('/remove/{id}', [App\Http\Controllers\Suspect::class, 'suspect']);
    Route::get('/update/{id}', [App\Http\Controllers\Suspect::class, 'suspect']);
    Route::post('/save', [App\Http\Controllers\Suspect::class, 'suspect']);
    });

