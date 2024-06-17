<?php

use App\Http\Controllers\InsertPersonController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\UtilidadesEtiquetasNomesTableController as UtNameController;
use App\Http\Controllers\UtilidadesEtiquetasTableController as UtController;
use App\Http\Controllers\UtilidadesEtiquetasConfiguracoesTableController as UtConfController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

    // Rota de autocomplete
    Route::get('/autocomplete', [UtNameController::class, 'autocomplete'])->name('etiqueta.autocomplete');
    // ... outras rotas para gerenciar etiqueta
});
Route::get('/timezone', function () {
    return config('app.timezone') . now();
});


Route::group(['prefix' => 'etiquetaCarrinho'], function () {

    // Rota Index    // Rota Index
    Route::get('/layout', function () {
        return view('etiquetaCarrinho.layout');
    });

    // Rota Index    // Rota Print
    Route::put('/print', function () {
        return view('etiquetaCarrinho.print');
    });

    Route::get('/', [UtController::class, 'index'])->name('etiquetaCarrinho.index');

    // Rotas de criação
    Route::get('/create', [UtController::class, 'create'])->name('etiquetaCarrinho.create');
    Route::post('/store', [UtController::class, 'store'])->name('etiquetaCarrinho.store');

    // Rotas de edição
    Route::get('/{id}/edit', [UtController::class, 'edit'])->name('etiquetaCarrinho.edit'); // Usando o ID do registro
    Route::post('/{id}/editEtiqueta', [UtController::class, 'editEtiqueta'])->name('etiquetaCarrinho.editEtiqueta'); // Usando o ID do registro
    Route::put('/{id}/update', [UtController::class, 'update'])->name('etiquetaCarrinho.update'); // Usando o ID do registro

    // Rota de exclusão
    Route::delete('/{id}/delete', [UtController::class, 'destroy'])->name('etiquetaCarrinho.delete'); // Usando o ID do registro

    // Rota de impressão
    Route::put('/{id}/print', [UtController::class, 'print'])->name('etiquetaCarrinho.print'); // Usando o ID do registro

    Route::get('/listaMesclada', [UtController::class, 'listaMesclada'])->name('etiquetaCarrinho.listaMesclada');
    // ... outras rotas para gerenciar etiquetaCarrinho
});

Route::group(['prefix' => 'configuracaoEtiqueta'], function () {

    // Rota Index
    Route::get('/', [UtConfController::class, 'index'])->name('configuracaoEtiqueta.index');

    // Rotas de criação
    Route::get('/create', [UtConfController::class, 'create'])->name('configuracaoEtiqueta.create');
    Route::post('/store', [UtConfController::class, 'store'])->name('configuracaoEtiqueta.store');

    // Rotas de edição
    Route::get('/{id}/edit', [UtConfController::class, 'edit'])->name('configuracaoEtiqueta.edit'); // Usando o ID do registro
    Route::put('/{id}/update', [UtConfController::class, 'update'])->name('configuracaoEtiqueta.update'); // Usando o ID do registro

    // Rota de exclusão
    Route::delete('/{id}/delete', [UtConfController::class, 'destroy'])->name('configuracaoEtiqueta.delete'); // Usando o ID do registro

    // Rota de impressão
    Route::put('/{id}/print', [UtConfController::class, 'print'])->name('configuracaoEtiqueta.print'); // Usando o ID do registro

});