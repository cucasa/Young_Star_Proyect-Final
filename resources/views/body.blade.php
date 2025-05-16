@extends('layouts.app')

@section('content')
<!-- HEADER / HERO -->
<header class="hero position-relative text-white">
  <!-- Fondo degradado con overlay -->
  <div class="hero-bg position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, #141E30, #243B55); z-index: 1;"></div>

  <div class="container position-relative text-center py-5" style="z-index: 2;">
    <img src="{{ asset('Assets/logo2.png') }}" alt="Young Star Logo" class="img-fluid mb-4" style="max-width: 300px;">
    <h1 class="display-2 fw-bold">Young Star</h1>
    <p class="lead">Donde las ideas y la creatividad se unen para transformar el futuro.</p>
  </div>
</header>

<!-- MAIN CONTENT -->
<main>
  <!-- Sección de Bienvenida y Características -->
  <section id="features" class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h1 class="fw-bold">Bienvenido a Young Star</h1>
        <p class="lead">La plataforma donde puedes explorar, aprender y compartir tus ideas.</p>
      </div>
      <div class="row text-center">
        <div class="col-md-4 mb-4">
          <div class="p-4 border rounded shadow-sm">
            <i class="fas fa-comments fa-3x text-primary mb-3"></i>
            <h4 class="fw-bold">Foros</h4>
            <p>Conecta, debate y comparte en comunidades activas.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="p-4 border rounded shadow-sm">
            <i class="fas fa-book fa-3x text-primary mb-3"></i>
            <h4 class="fw-bold">Artículos</h4>
            <p>Descubre contenido curado y aprende de expertos en cada tema.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="p-4 border rounded shadow-sm">
            <i class="fas fa-tools fa-3x text-primary mb-3"></i>
            <h4 class="fw-bold">Recursos</h4>
            <p>Encuentra herramientas y materiales para crecer profesionalmente.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
