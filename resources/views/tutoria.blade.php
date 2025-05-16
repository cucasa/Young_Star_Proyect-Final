{{-- resources/views/tutoriales/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Guías y Tutoriales: Superación Personal</h1>
    <p class="lead text-center">
        Descubre guías paso a paso, tutoriales prácticos y recursos inspiradores para transformar tu vida y alcanzar tu máximo potencial. Aquí encontrarás estrategias para mejorar tus hábitos, aumentar tu autoconfianza y desarrollar una mentalidad resiliente.
    </p>

    <!-- Sección de tarjetas principales -->
    <div class="row">
        <!-- Guía de Mindfulness -->
        <div class="col-md-6 mb-4">
            <div class="card bg-dark text-white shadow-sm">
                <img src="https://via.placeholder.com/500x300?text=Gu%C3%ADa+de+Mindfulness" class="card-img-top" alt="Guía de Mindfulness">
                <div class="card-body">
                    <h5 class="card-title">Guía de Mindfulness</h5>
                    <p class="card-text">
                        Aprende técnicas para vivir el presente, reducir el estrés y conectar con tu interior.
                    </p>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>

        <!-- Tutorial de Hábitos Positivos -->
        <div class="col-md-6 mb-4">
            <div class="card bg-dark text-white shadow-sm">
                <img src="https://via.placeholder.com/500x300?text=Tutorial+de+Hábitos+Positivos" class="card-img-top" alt="Tutorial de Hábitos Positivos">
                <div class="card-body">
                    <h5 class="card-title">Tutorial de Hábitos Positivos</h5>
                    <p class="card-text">
                        Descubre cómo incorporar hábitos saludables en tu rutina diaria para potenciar tu crecimiento personal.
                    </p>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección adicional de recursos -->
    <div class="row">
        <!-- Guía de Resiliencia -->
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white shadow-sm">
                <img src="https://via.placeholder.com/500x300?text=Guía+de+Resiliencia" class="card-img-top" alt="Guía de Resiliencia">
                <div class="card-body">
                    <h5 class="card-title">Guía de Resiliencia</h5>
                    <p class="card-text">
                        Estrategias prácticas para transformar las adversidades en una oportunidad de crecimiento.
                    </p>
                    <a href="#" class="btn btn-primary">Ver detalle</a>
                </div>
            </div>
        </div>

        <!-- Tutorial de Autoestima -->
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white shadow-sm">
                <img src="https://via.placeholder.com/500x300?text=Tutorial+de+Autoestima" class="card-img-top" alt="Tutorial de Autoestima">
                <div class="card-body">
                    <h5 class="card-title">Tutorial de Autoestima</h5>
                    <p class="card-text">
                        Fortalece tu autoconfianza y aprende técnicas para valorar tu potencial.
                    </p>
                    <a href="#" class="btn btn-primary">Ver detalle</a>
                </div>
            </div>
        </div>

        <!-- Guía de Planificación de Metas -->
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white shadow-sm">
                <img src="https://via.placeholder.com/500x300?text=Guía+de+Planificación+de+Metas" class="card-img-top" alt="Guía de Planificación de Metas">
                <div class="card-body">
                    <h5 class="card-title">Guía de Planificación de Metas</h5>
                    <p class="card-text">
                        Aprende a definir y alcanzar objetivos claros que te impulsen hacia el éxito.
                    </p>
                    <a href="#" class="btn btn-primary">Ver detalle</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Video Tutorial Destacado -->
    <div class="mt-5">
        <h2 class="text-center mb-4">Video Tutorial Destacado</h2>
        <div class="ratio ratio-16x9">
            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Video de Superación Personal" allowfullscreen></iframe>
        </div>
    </div>
</div>
@endsection
