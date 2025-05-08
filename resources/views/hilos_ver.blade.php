@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">💬 Hilos en {{ $forum->name }}</h2>

    <!-- Mostrar los hilos existentes -->
    <div id="hilos-lista">
        @forelse($forum->threads as $thread)
            <div class="card mb-3 shadow-sm border-0">
                <div class="card-body">
                    <h4 class="text-primary">{{ $thread->titulo }}</h4>
                    <p class="text-muted">{{ $thread->body }}</p>
                    <small class="text-secondary">
                        📝 Creado por: {{ $thread->user->name }} | 📅 {{ $thread->created_at->format('d M Y') }}
                    </small>
                    <a href="#" class="btn btn-sm btn-outline-primary mt-2">Ver Hilo</a>
                </div>
            </div>
        @empty
            <div class="alert alert-warning text-center">⚠️ Aún no hay hilos en este foro.</div>
        @endforelse
    </div>

    <!-- Formulario para crear un nuevo hilo -->
    <div class="mt-4 p-4 border rounded bg-light">
        <h4>📝 Crear un Hilo</h4>
        <form action="{{ route('guardar_hilo') }}" method="POST">
            @csrf
            <input type="hidden" name="forum_id" value="{{ $forum->id }}">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título del Hilo</label>
                <input type="text" class="form-control shadow-sm" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Contenido</label>
                <textarea class="form-control shadow-sm" id="body" name="body" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">✨ Crear Hilo</button>
        </form>
    </div>
</div>
@endsection
