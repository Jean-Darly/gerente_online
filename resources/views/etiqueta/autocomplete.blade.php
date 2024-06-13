<!-- resources/views/etiqueta/autocomplete.blade.php -->

<input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" placeholder="Digite ou escolha uma etiqueta">
<input type="hidden" id="nome_id" name="nome_id">
<script src="{{ asset('js/autocomplete.js') }}"></script>