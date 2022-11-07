<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateReviewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'feedback'])->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'show'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/create', [CreateReviewController::class, 'show'])
    ->middleware(['auth', 'verified'])->name('show');

Route::post('/create', [CreateReviewController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('create');

require __DIR__.'/auth.php';
