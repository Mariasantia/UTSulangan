<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);

Route::resource('tasks', TaskController::class);

Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])
    ->name('tasks.complete');

Route::get('/report', [TaskController::class, 'report'])
    ->name('tasks.report');

Route::get('/dashboard', [TaskController::class, 'dashboard'])
    ->name('tasks.dashboard');