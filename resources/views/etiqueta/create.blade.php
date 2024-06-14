@extends('layouts.layout')

@section('title', 'Criar nome para etiqueta')

@section('content')
<div class="container mt-5">
    <div class="row md-12 justify-content-center">
        <div class="col-md-12">
            <div class="card bg-white rounded">
                <div class="card-header">
                    <h2>Criar Nome de Etiqueta</h2>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('etiqueta.store') }}">
                        @csrf
                        <div class="row md-12 justify-content-center">
                            <div class="col-md-8">
                                @include('etiqueta.autocomplete')
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-plus"></i> Criar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection