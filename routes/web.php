<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/task', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/task/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/task', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/task/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
