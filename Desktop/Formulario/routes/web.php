<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipamentoController;
use App\Models\Equipamento;
use App\Http\Controllers\InspecaoController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('form', [InspecaoController::class, 'create'])
    ->middleware(['auth'])
    ->name('form.create');

Route::post('form', [InspecaoController::class, 'store'])
    ->middleware(['auth'])
    ->name('form.store');

Route::resource('equipment', EquipamentoController::class)->middleware(['auth']);


require __DIR__ . '/auth.php';
