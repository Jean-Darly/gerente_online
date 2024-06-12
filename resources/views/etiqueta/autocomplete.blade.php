<!-- resources/views/etiqueta/autocomplete.blade.php -->

<div class="container mt-5">
    <h1>Autocomplete com jQuery e Laravel</h1>
    <form id="etiquetaForm" method="POST" action="{{ route('etiqueta.store') }}">
      @csrf
      <div class="mb-3">
        <label for="etiqueta" class="form-label">Escolha uma etiqueta:</label>
        <input type="text" class="form-control" id="etiqueta" name="etiqueta" placeholder="Digite ou escolha uma etiqueta">
        <input type="hidden" id="etiqueta_id" name="etiqueta_id">
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
  