<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\PendingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/note', NoteController::class);
Route::get('/pending/completed', [PendingController::class, 'completed'])->name('pending.completed');
Route::get('/pending/pending', [PendingController::class, 'pending'])->name('pending.pending');
Route::patch('/pending/{pending}/toggle', [PendingController::class, 'toggle'])->name('pending.toggle');
Route::resource('/pending', PendingController::class);
