<!-- resources/views/insertPersons.blade.php  -->
@extends('layouts.layout')
@section('title', 'Cadastro de Usuários')
@section('content')
    <div class="container">
        <h1>Inserir Pessoa</h1>
        <form method="POST" action="{{ route('insertPerson.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Idade:</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <button type="submit" class="btn btn-primary">Inserir</button>
        </form>
    </div>
@endsection