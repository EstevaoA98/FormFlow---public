<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InspecaoController;
use App\Http\Controllers\EquipamentoController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('form', [InspecaoController::class, 'create'])
    ->middleware(['auth'])
    ->name('form.create');

Route::post('form', [InspecaoController::class, 'store'])
    ->middleware(['auth'])
    ->name('form.store');

Route::resource('equipment', EquipamentoController::class)->middleware(['auth']);

Route::get('/', [InspecaoController::class, 'index'])->name('inspecoes.index');

Route::get('/dashboard', [InspecaoController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/inspecoes', [InspecaoController::class, 'index'])->name('inspecoes.index');

Route::get('/inspecoes/{id}/edit', [InspecaoController::class, 'edit'])->name('inspecoes.edit')->middleware('auth');

Route::put('/inspecoes/{id}', [InspecaoController::class, 'update'])->name('inspecoes.update')->middleware('auth');

Route::delete('/inspecoes/{id}', [InspecaoController::class, 'destroy'])->name('inspecoes.destroy')->middleware('auth');

Route::get('/equipment', [EquipamentoController::class, 'index'])->name('equipment.index')->middleware('auth');

Route::get('/equipment/{id}/edit', [EquipamentoController::class, 'edit'])->name('equipment.edit')->middleware('auth');

Route::put('/equipment/{id}', [EquipamentoController::class, 'update'])->name('equipment.update')->middleware('auth');

Route::get('/equipment/hidden', [EquipamentoController::class, 'hidden'])->name('equipment.hidden')->middleware('auth');

Route::put('/equipment/{id}/restore', [EquipamentoController::class, 'restore'])->name('equipment.restore')->middleware('auth');

Route::delete('/equipment/{id}/forceDelete', [EquipamentoController::class, 'forceDelete'])->name('equipment.forceDelete')->middleware('auth');

require __DIR__.'/auth.php';
