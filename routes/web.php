<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

// イベント一覧
Route::middleware('auth')->group(
    function () {
        Route::get('/', [EventController::class, 'index'])->name('index');
    }
);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// /event
Route::middleware('auth')->group(
    function () {
        Route::prefix('event')->name('event.')->group(function () {
            // イベント新規登録画面
            Route::get('create', [EventController::class, 'create'])->name('create');
            // イベント新規登録処理
            Route::post('store', [EventController::class, 'store'])->name('store');
        });
    }
);

require __DIR__ . '/auth.php';
