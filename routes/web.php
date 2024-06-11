<?php

use App\Http\Controllers\InsertPersonController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\UtilidadesEtiquetasNomesTableController AS UtNameController;
use App\Http\Controllers\UtilidadesEtiquetasTableController AS UtController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.welcome');
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/aipim', [WelcomeController::class, 'index']);
Route::get('/person', [InsertPersonController::class, 'index']);
Route::get('/person', [InsertPersonController::class, 'store']);

Route::group(['prefix' => 'pessoas'], function () {
    Route::post('/store', [PessoaController::class, 'store'])->name('pessoas.store');
    Route::get('/create', [PessoaController::class, 'create'])->name('pessoas.create');
    Route::get('/edit', [PessoaController::class, 'edit'])->name('pessoas.edit');
    Route::put('/update', [PessoaController::class, 'update'])->name('pessoas.update');
    // ... outras rotas para gerenciar pessoas
});
// routes/web.php

Route::group(['prefix' => 'etiqueta'], function () {

    // Rota Index
    Route::get('/', [UtNameController::class, 'index'])->name('etiqueta.index');

    // Rotas de criação
    Route::get('/create', [UtNameController::class, 'create'])->name('etiqueta.create');
    Route::post('/store', [UtNameController::class, 'store'])->name('etiqueta.store');

    // Rotas de edição
    Route::get('/{id}/edit', [UtNameController::class, 'edit'])->name('etiqueta.edit'); // Usando o ID do registro
    Route::put('/{id}/update', [UtNameController::class, 'update'])->name('etiqueta.update'); // Usando o ID do registro

    // Rota de exclusão
    Route::delete('/{id}/delete', [UtNameController::class, 'destroy'])->name('etiqueta.delete'); // Usando o ID do registro

    // Rotas de impressão
    Route::put('/{id}/print', [UtNameController::class, 'print'])->name('etiqueta.print'); // Usando o ID do registro

    // ... outras rotas para gerenciar etiqueta
});


Route::group(['prefix' => 'carrinhoEtiqueta'], function () {

    // Rota Index
    Route::get('/', [UtController::class, 'index'])->name('carrinhoEtiqueta.index');

    // Rotas de criação
    Route::get('/create', [UtController::class, 'create'])->name('carrinhoEtiqueta.create');
    Route::post('/store', [UtController::class, 'store'])->name('carrinhoEtiqueta.store');

    // Rotas de edição
    Route::get('/{id}/edit', [UtController::class, 'edit'])->name('carrinhoEtiqueta.edit'); // Usando o ID do registro
    Route::put('/{id}/update', [UtController::class, 'update'])->name('carrinhoEtiqueta.update'); // Usando o ID do registro

    // Rota de exclusão
    Route::delete('/{id}/delete', [UtController::class, 'destroy'])->name('carrinhoEtiqueta.delete'); // Usando o ID do registro

    // Rota de impressão
    Route::put('/{id}/print', [UtController::class, 'print'])->name('carrinhoEtiqueta.print'); // Usando o ID do registro

    // ... outras rotas para gerenciar carrinhoEtiqueta
});


