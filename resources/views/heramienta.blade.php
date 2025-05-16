{{-- resources/views/herramientas/recursos.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Recursos para la Superación Personal</h1>
    <p class="lead text-center">
        A continuación te presentamos 50 recursos (páginas y cursos) que te ayudarán a transformar tu vida, desarrollar hábitos positivos y fortalecer tu crecimiento personal.
    </p>

    <!-- Sección de Páginas Recomendadas -->
    <div class="mb-5">
        <h3 class="mb-3">Páginas Recomendadas</h3>
        <ul class="list-group">
            @php
                $paginas = [];
                // Crearemos 25 elementos de páginas de ejemplo
                for($i = 1; $i <= 25; $i++) {
                    $paginas[] = [
                        'titulo' => "Página de Superación Personal $i",
                        'descripcion' => "Descubre consejos, artículos y estrategias para mejorar tu bienestar y potenciar tu crecimiento personal. Recurso número $i.",
                        'enlace' => "https://www.ejemplo.com/pagina$i"
                    ];
                }
            @endphp

            @foreach($paginas as $pagina)
                <li class="list-group-item bg-dark text-white border-0 mb-2">
                    <a href="{{ $pagina['enlace'] }}" target="_blank" class="text-white text-decoration-none">
                        <strong>{{ $pagina['titulo'] }}</strong>
                    </a>
                    – {{ $pagina['descripcion'] }}
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Sección de Cursos Recomendados -->
    <div>
        <h3 class="mb-3">Cursos Recomendados</h3>
        <div class="row">
            @php
                $cursos = [];
                // Generamos 25 cursos de ejemplo
                for($j = 1; $j <= 25; $j++) {
                    $cursos[] = [
                        'titulo' => "Curso de Superación Personal $j",
                        'descripcion' => "Curso en línea para desarrollar tu autoconfianza, gestionar emociones y alcanzar tus metas. Curso número $j.",
                        'enlace' => "https://www.ejemplo.com/curso$j"
                    ];
                }
            @endphp

            @foreach($cursos as $curso)
                <div class="col-md-4 mb-4">
                    <div class="card bg-dark text-white h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $curso['titulo'] }}</h5>
                            <p class="card-text">{{ $curso['descripcion'] }}</p>
                            <a href="{{ $curso['enlace'] }}" target="_blank" class="btn btn-primary">Ver Curso</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
