{{-- resources/views/etiqueta/index.blade.php --}}

@extends('layouts.layout')

@section('title', 'Carrinho Etiquetas')

@section('content')
<div class="container">
    <h1>index Carrinho Etiqueta</h1>
    @include('etiquetaCarrinho.listaCarrinhoEtiquetas', ['carrinhoEtiquetas' => $carrinhoEtiquetas])
</div>
@endsection