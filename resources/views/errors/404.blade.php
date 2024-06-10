<!-- resources/views/errors/404.blade.php -->

@extends('layouts.layout')

@section('title', 'Página Não Encontrada')

@section('content')
<div class="container text-center">
    <h1 class="display-1">404</h1>
    <p class="lead">Desculpe, a página que você está procurando não foi encontrada.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Voltar para a Home</a>
    </div>
    @endsection
