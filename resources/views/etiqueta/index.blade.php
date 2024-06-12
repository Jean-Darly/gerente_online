{{-- resources/views/etiqueta/index.blade.php --}}

@extends('layouts.layout')

@section('title', 'Etiqueta')

@section('content')
    <div class="container">
        <h1>index etiqueta</h1>
        @include('etiqueta.listaEtiquetas', ['etiquetas' => $etiquetas])
        @include('etiqueta.autocomplete')
    </div>
@endsection
