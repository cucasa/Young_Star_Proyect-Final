<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #141E30, #243B55);">
  <div class="container">
    <!-- Logo y marca -->
    <a class="navbar-brand d-flex align-items-center" href="{{ url('youngstar') }}">
      <img src="{{ asset('Assets/logo2.png') }}" alt="YoungStar Logo" class="me-2" style="height: 80px;">
      <span class="fw-bold fs-4">Young Star</span>
    </a>

    <!-- Botón para dispositivos móviles -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Ítems del menú -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a href="{{ url('youngstar') }}" class="nav-link text-white fw-semibold">Inicio</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('foros_ver') }}" class="nav-link text-white fw-semibold">Foros</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('articulos_index') }}" class="nav-link text-white fw-semibold">Artículos</a>
        </li>
        <!-- Menú desplegable de Recursos -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" id="recursosMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Recursos
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="recursosMenu">
            <li><a class="dropdown-item" href="/herramientas">Herramientas</a></li>
            <li><a class="dropdown-item" href="/material-educativo">Material Educativo</a></li>
            <li><a class="dropdown-item" href="/tutoriales">Guías y Tutoriales</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-white fw-semibold">Noticias</a>
        </li>
      </ul>

      <!-- Zona de botones: perfil, iniciar sesión y registrarse -->
      <div class="d-flex align-items-center">
        @if(auth()->check())
          <a href="{{ route('perfil') }}" class="btn btn-outline-light fw-semibold me-2">Perfil</a>
        @endif
        <a href="{{ route('entrada') }}" class="btn btn-light fw-semibold me-2">Iniciar sesión</a>
        <a href="{{ route('registro') }}" class="btn btn-outline-light fw-semibold">Registrarse</a>
      </div>
    </div>
  </div>
</nav>
