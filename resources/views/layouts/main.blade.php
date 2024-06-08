<!-- resources/views/layouts/main.blade.php -->
<div class="container">
    <!-- Conteúdo da navegação -->
    @include('layouts.navbar')
</div>
<div class="container">
    <!-- Conteúdo da página -->
    @yield('content')
</div>