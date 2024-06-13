<!-- resources/views/layouts/main.blade.php -->

<!-- Conteúdo da navegação -->
<header class="text-white p-0 w-100">
    @include('layouts.navbar')
</header>

<div class="container">
    <!-- Conteúdo da página -->
    @yield('content')
</div>