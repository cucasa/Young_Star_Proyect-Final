@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">💬 Hilos en {{ $forum->name }}</h2>

    <div id="hilos-lista">
        @forelse($forum->threads as $thread)
            <div class="card mb-3 shadow-sm border-0">
                <div class="card-body">
                    <h4 class="text-primary">{{ $thread->titulo }}</h4>
                    <p class="text-muted">{{ $thread->body }}</p>
                    <small class="text-secondary">
                        📝 Creado por: {{ $thread->user->name }} | 📅 {{ $thread->created_at ? $thread->created_at->format('d M Y') : 'Fecha no disponible' }}
                    </small>
                    <button class="btn btn-sm btn-success mt-2" onclick="mostrarFormulario({{ $thread->id }})">Crear Post</button>
                </div>

                <!-- Formulario para escribir un post -->
                <div id="formularioPost_{{ $thread->id }}" class="mt-4 p-4 border rounded bg-light" style="display: none;">
                    <h4>✍️ Responder al Hilo</h4>
                    <form action="{{ route('guardar_post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                        <div class="mb-3">
                            <label for="body_{{ $thread->id }}" class="form-label">Tu Respuesta</label>
                            <textarea class="form-control shadow-sm" id="body_{{ $thread->id }}" name="body" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">💬 Publicar</button>
                    </form>
                </div>

                <!-- Contenedor de Posts -->
                <div id="posts-lista_{{ $thread->id }}" class="mt-4">
                    @forelse($thread->posts as $post)
                        <div class="card mb-3 shadow-sm border-0">
                            <div class="card-body">
                                <p class="text-muted">{{ $post->body }}</p>
                                <small class="text-secondary">
                                    ✍️ Por: {{ $post->user->name }} | 📅 {{ $post->created_at ? $post->created_at->format('d M Y') : 'Fecha no disponible' }}
                                </small>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-warning text-center">⚠️ No hay respuestas en este hilo aún.</div>
                    @endforelse
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

<script>
    function mostrarFormulario(threadId) {
        document.getElementById("formularioPost_" + threadId).style.display = "block";
    }
</script>
@endsection
