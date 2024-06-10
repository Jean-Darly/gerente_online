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
                    <a class="nav-link dropdown-toggle" href="/etiqueta" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Etiqueta
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/create">Incluir</a>
                        <a class="dropdown-item" href="/editar">Editar</a>
                        <a class="dropdown-item" href="/print">Imprimir</a>
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
