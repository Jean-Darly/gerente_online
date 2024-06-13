{{-- resources/views/etiqueta/index.blade.php --}}

@extends('layouts.layout')

@section('title', 'Etiqueta')

@section('content')
<div class="container">
    @include('etiqueta.listaEtiquetas', ['etiquetas' => $etiquetas])
</div>
@endsection
