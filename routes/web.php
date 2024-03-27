<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/task', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/task/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/task', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('/task/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/task/{task}/update', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/task/{task}/delete', [TaskController::class, 'delete'])->name('tasks.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
