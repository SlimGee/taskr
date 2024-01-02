<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/auth/{driver}/redirect', [SocialiteController::class, 'redirect'])
    ->name('socialite.redirect')
    ->whereIn('driver', ['google']);

Route::get('/auth/{driver}/callback', [SocialiteController::class, 'callback'])
    ->name('socialite.callback')
    ->whereIn('driver', ['google']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::patch('/tasks/{task}/status/{status}', [TaskController::class, 'status'])
        ->name('tasks.status');

    Route::resource('tasks', TaskController::class);

    Route::singleton('me', ProfileController::class)->only(['show']);
});
