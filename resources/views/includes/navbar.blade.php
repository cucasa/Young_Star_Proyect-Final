<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1a1aff;">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('youngstar') }}">
            <img src="{{ asset('Assets/logo2.png') }}" alt="YoungStar Logo" class="me-2" style="height: 150px;">
            <span class="text-white fw-bold fs-4">Young Star</span>
        </a>

        <!-- Botón para móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Ítems del menú -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white fw-semibold">Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('foros_ver') }}" class="nav-link text-white fw-semibold">Foros</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white fw-semibold">Artículos</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white fw-semibold">Recursos</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white fw-semibold">Noticias</a>
                </li>
            </ul>


        <!-- Botón de perfil (Solo visible si el usuario está autenticado) -->
                 @if(auth()->check())
        <div class="d-flex">
               <a href="{{ route('perfil') }}" class="btn btn-light fw-semibold me-2">Perfil</a>
         </div>
              @endif


            <!-- Botón de sesión -->
            <div class="d-flex">
                <a href="{{ route('entrada') }}" class="btn btn-light fw-semibold me-2">Iniciar sesión</a>
                <a href="{{ route('registro') }}" class="btn btn-outline-light fw-semibold">Registrarse</a>
            </div>
        </div>
    </div>
</nav>


