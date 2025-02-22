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

//topページのroute
Route::get('top', function () {
    return view('top');
});

//BoardControllerのアクション
Route::get('board', 'App\Http\Controllers\BoardController@index')->name('board.index');
Route::get('board/show/{board}', 'App\Http\Controllers\BoardController@show')->name('board.show');//nameは名前付きルート名
Route::get('board/create', 'App\Http\Controllers\BoardController@create');
Route::post('board/create', 'App\Http\Controllers\BoardController@store');

//PostControllerのアクション
Route::post('board/show/{board}', 'App\Http\Controllers\PostController@store')->name('board.show');

//InfoControllerのアクション
Route::get('board/info', 'App\Http\Controllers\InfoController@info');
Route::post('board/info', 'App\Http\Controllers\InfoController@send');
Route::get('board/success', 'App\Http\Controllers\InfoController@success')->name('board.success');

require __DIR__ . '/auth.php';
