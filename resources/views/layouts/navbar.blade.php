<!-- resources/views/navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Darly Gerenciamento</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/etiqueta" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Etiqueta
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- etiqueta nomes --}}
                        <h6 class="dropdown-header bg-secondary text-black">Nomes</h6>
                        <a class="dropdown-item" href="/etiqueta/create">Criar</a>
                        <a class="dropdown-item" href="/etiqueta">Editar</a>
                        {{-- Divisória --}}
                        <div class="dropdown-divider"></div>
                        {{-- Carrinho etiquetas --}}
                        <h6 class="dropdown-header bg-secondary text-black">Carrinho Etiquetas</h6>
                        <a class="dropdown-item" href="/etiquetaCarrinho/create">Criar</a>
                        <a class="dropdown-item" href="/etiquetaCarrinho/layout" target="_blank">Imprimir</a>
                        <div class="dropdown-divider"></div>
                        {{-- Layout etiquetas --}}
                        <h6 class="dropdown-header bg-secondary text-black">Configurações das Etiquetas</h6>
                        <a class="dropdown-item" href="/etiquetaConfiguracao/">Criar ou Editar</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pessoas/create">Incluir Pessoas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pessoas/edit">Editar Pessoas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
