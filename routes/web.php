<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\MovimentacaoController;


Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('categorias', CategoriaController::class);
Route::resource('produtos', ProdutoController::class);


Route::resource('movimentacoes', MovimentacaoController::class)
    ->parameters(['movimentacoes' => 'movimentacao']);
