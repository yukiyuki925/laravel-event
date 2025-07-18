<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventLikeController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileController;
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

// event
Route::middleware('auth')->group(
    function () {
        Route::prefix('event')->name('event.')->group(function () {
            // イベント新規登録画面
            Route::get('create', [EventController::class, 'create'])->name('create');
            // イベント新規登録処理
            Route::post('store', [EventController::class, 'store'])->name('store');
            // イベント詳細表示
            Route::get('{id}', [EventController::class, 'show'])->name('show');
        });

        // likes
        Route::post('/event/{event}/like', [EventLikeController::class, 'like'])
            ->middleware('auth')
            ->name('event-like');

        // profile
        Route::prefix('mypage')->name('mypage.')->group(function () {
            Route::get('index', [MypageController::class, 'index'])->name('index');
            Route::get('create-index', [MypageController::class, 'createIndex'])->name('create-index');
            Route::get('likes', [MypageController::class, 'likes'])->name('likes');
            Route::get('likes/{id}', [MypageController::class, 'likesShow'])->name('likes-show');
            Route::get('{id}/edit', [MypageController::class, 'edit'])->name('edit');
            Route::put('{id}', [MypageController::class, 'update'])->name('update');
            Route::get('{id}', [MypageController::class, 'show'])->name('show');
        });
    }
);

require __DIR__ . '/auth.php';