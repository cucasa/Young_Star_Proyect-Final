{{-- resources/views/material-educativo/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Material Educativo: Superación Personal</h1>
    <p class="lead text-center">
        Descubre recursos, estrategias y conocimientos para impulsar tu bienestar, superar obstáculos
        y alcanzar tu máximo potencial. Aquí encontrarás contenido enfocado en el crecimiento personal.
    </p>

    <div class="row">
        <!-- Tarjeta 1: Resiliencia -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 bg-dark text-white shadow-sm">
                <img src="https://via.placeholder.com/500x300?text=Resiliencia" class="card-img-top" alt="El poder de la resiliencia">
                <div class="card-body">
                    <h5 class="card-title">El poder de la resiliencia</h5>
                    <p class="card-text">
                        Aprende a transformar las adversidades en oportunidades para crecer. Descubre técnicas que te ayudarán a desarrollar una mentalidad fuerte y resiliente.
                    </p>
                    <a href="#" class="btn btn-primary">Leer más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta 2: Mindfulness y Meditación -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 bg-dark text-white shadow-sm">
                <img src="https://via.placeholder.com/500x300?text=Mindfulness" class="card-img-top" alt="Mindfulness y meditación">
                <div class="card-body">
                    <h5 class="card-title">Mindfulness y meditación</h5>
                    <p class="card-text">
                        Explora prácticas de mindfulness y meditación para reducir el estrés, mejorar tu concentración y vivir el presente con mayor plenitud.
                    </p>
                    <a href="#" class="btn btn-primary">Leer más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta 3: Hábitos Positivos -->
        <div class="col-md-4 mb-4">
            <div class="card h-100 bg-dark text-white shadow-sm">
                <img src="https://via.placeholder.com/500x300?text=Habitos+de+Exito" class="card-img-top" alt="Hábitos positivos para el éxito">
                <div class="card-body">
                    <h5 class="card-title">Hábitos positivos para el éxito</h5>
                    <p class="card-text">
                        Descubre estrategias para construir hábitos saludables que impulsen tu éxito personal y profesional. Transforma tu rutina y alcanza nuevos objetivos.
                    </p>
                    <a href="#" class="btn btn-primary">Leer más</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de video destacado -->
    <div class="mt-5">
        <h2 class="text-center mb-4">Video Destacado: Transforma Tu Vida</h2>
        <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Video de superación personal" allowfullscreen></iframe>
        </div>
    </div>
</div>
@endsection
