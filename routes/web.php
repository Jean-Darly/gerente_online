<?php

use App\Http\Controllers\InsertPersonController;
use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Models\InsertPerson;


Route::get('/jean', [WelcomeController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/aipim', [WelcomeController::class, 'index']);
Route::get('/person', [InsertPersonController::class, 'index']);
Route::get('/person', [InsertPersonController::class, 'store']);

Route::group(['prefix' => 'pessoas'], function () {
    Route::get('/create', [PessoaController::class, 'create'])->name('pessoas.create');
    Route::post('/store', [PessoaController::class, 'store'])->name('pessoas.store');
    // ... outras rotas para gerenciar pessoas
});

