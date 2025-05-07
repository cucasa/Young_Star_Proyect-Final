@extends('layouts.app')

@section('content')





<!-- Sección de encabezado mejorada -->

<div class="card bg-dark text-white border-0">
    <img src="{{ asset('Assets/logo3.png') }}" class="card-img opacity-25" alt="Fondo YoungStar">
    <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center text-center">
        <img src="{{ asset('Assets/logo2.png') }}" alt="Logo YoungStar" class="img-fluid mb-3" style="max-width: 400px; width: 100%;">
        <h1 class="card-title display-3 fw-bold">Young Star</h1>
    </div>
</div>





      <div class="container py-5">
          <!-- Sección de bienvenida -->
          <div class="text-center mb-5">
              <h1 class="fw-bold">Bienvenido a Young Star</h1>
              <p class="lead">La plataforma donde puedes explorar, aprender y compartir tus ideas.</p>
              <a href="#" class="btn btn-primary btn-lg">Explorar Foros</a>
          </div>

          <!-- Sección de características -->
          <div class="row text-center mb-5">
              <div class="col-md-4">
                  <i class="fas fa-comments fa-3x text-primary mb-3"></i>
                  <h4 class="fw-bold">Foros</h4>
                  <p>Únete a discusiones interesantes y comparte tus ideas con la comunidad.</p>
              </div>
              <div class="col-md-4">
                  <i class="fas fa-book fa-3x text-primary mb-3"></i>
                  <h4 class="fw-bold">Artículos</h4>
                  <p>Lee artículos educativos y descubre contenido valioso creado por expertos.</p>
              </div>
              <div class="col-md-4">
                  <i class="fas fa-tools fa-3x text-primary mb-3"></i>
                  <h4 class="fw-bold">Recursos</h4>
                  <p>Accede a herramientas y recursos que te ayudarán a alcanzar tus metas.</p>
              </div>
          </div>




<!-- Sección de noticias -->
<div class="container py-5">
    <h2 class="fw-bold text-center mb-5">Últimas Noticias</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Noticia 1">
                <div class="card-body">
                    <h5 class="card-title">Título de la Noticia 1</h5>
                    <p class="card-text">Esta es una breve descripción de la noticia para captar la atención del lector.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Noticia 2">
                <div class="card-body">
                    <h5 class="card-title">Título de la Noticia 2</h5>
                    <p class="card-text">Otra descripción breve para destacar el contenido de esta noticia.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Noticia 3">
                <div class="card-body">
                    <h5 class="card-title">Título de la Noticia 3</h5>
                    <p class="card-text">Descripción breve que invita al lector a explorar más sobre esta noticia.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Noticia 4">
                <div class="card-body">
                    <h5 class="card-title">Título de la Noticia 4</h5>
                    <p class="card-text">Esta es una breve descripción adicional para completar la sección de noticias.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



