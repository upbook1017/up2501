<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//BoardControllerのアクション
Route::get('board', 'App\Http\Controllers\BoardController@index');
Route::get('board/show/{board}', 'App\Http\Controllers\BoardController@show');
Route::get('board/create', 'App\Http\Controllers\BoardController@create');
Route::post('board/create', 'App\Http\Controllers\BoardController@store');

//PostControllerのアクション
Route::get('post', 'App\Http\Controllers\PostController@index');
Route::post('post', 'App\Http\Controllers\PostController@create');

require __DIR__ . '/auth.php';
