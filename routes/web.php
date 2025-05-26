<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CorridaController;
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

Route::middleware('auth')->group(function () {
    Route::get('/corrida', [CorridaController::class, 'index'])->name('corridaindex');
    Route::get('/corridas/{corrida}', [CorridaController::class, 'show'])->name('corridausers.show');
    Route::get('/corrida/create', [CorridaController::class, 'create'])->name('corridacreate');
    Route::post('/corridas', [CorridaController::class, 'store'])->name('corridastore');
    Route::get('/corrida/{corrida}/edit', [CorridaController::class, 'edit'])->name('corridaedit');
    Route::put('/corrida/{corrida}', [CorridaController::class, 'update'])->name('corridaupdate');
    Route::delete('/corridas/{corrida}', [CorridaController::class, 'destroy'])->name('corridadelete');
});

require __DIR__.'/auth.php';
