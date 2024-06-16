@extends('layouts.layout')

@section('title', 'Gerenciamento on-line')

@section('content')
@php
    $col = 6;
    $row = 16;
@endphp

<div class="container-sm">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Etiqueta</h5>
                </div>
                <div class="card-body">
                    @for ($r = 1; $r <= $row; $r++)
                        <div class="row mb-1">
                            @for ($c = 1; $c <= $col; $c++)
                                <div class="col">
                                    <button type="button" class="btn btn-outline-primary toggle-bg">
                                        {{$r < 10 ? "0" . $r : $r}} :: {{$c<10?"0".$c:$c}}
                                    </button>
                                </div>
                            @endfor
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Instruções</h5>
                </div>
                <div class="card-body">
                    Marque as etiquetas que NÂO seram impressas
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.toggle-bg').on('click', function () {
                $(this).toggleClass('bg-secondary');
            });
        });
    </script>
@endpush