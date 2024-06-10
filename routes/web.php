<?php

use App\Http\Controllers\InsertPersonController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\EtiquetaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.welcome');
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/aipim', [WelcomeController::class, 'index']);
Route::get('/person', [InsertPersonController::class, 'index']);
Route::get('/person', [InsertPersonController::class, 'store']);

Route::group(['prefix' => 'pessoas'], function () {
    Route::get('/store', [PessoaController::class, 'store'])->name('pessoas.store');
    Route::get('/create', [PessoaController::class, 'create'])->name('pessoas.create');
    Route::get('/edit', [PessoaController::class, 'edit'])->name('pessoas.edit');
    Route::put('/update', [PessoaController::class, 'update'])->name('pessoas.update');
    // ... outras rotas para gerenciar pessoas
});
Route::group(['prefix' => 'etiqueta'], function () {
    Route::get('/', [EtiquetaController::class, 'index'])->name('etiqueta.index');
    Route::get('/create', [EtiquetaController::class, 'create'])->name('etiqueta.create');
    Route::get('/edit', [EtiquetaController::class, 'edit'])->name('etiqueta.edit');
    Route::put('/update', [EtiquetaController::class, 'update'])->name('etiqueta.update');
    Route::put('/print', [EtiquetaController::class, 'print'])->name('etiqueta.print');
    // ... outras rotas para gerenciar pessoas
});

