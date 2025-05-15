@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">💬 Hilo: {{ $forum->name }}</h2>

    <div id="hilos-lista">
        @forelse($forum->threads as $thread)
            <div class="card mb-3 shadow-sm border-0">
                <div class="card-body">
                    <!-- Información del Hilo -->
                    <h4 class="text-primary">{{ $thread->titulo }}</h4>
                    <p class="text-muted">{{ $thread->body }}</p>
                    <small class="text-secondary">
                        📝 Creado por: {{ $thread->user->name }} | 📅 {{ $thread->created_at->format('d M Y') }}
                    </small>

                    <!-- Sección de Valoración con estrellas interactivas -->
                    <div class="mt-4">
                        <h3>⭐ Valora este hilo</h3>
                        <form action="{{ route('valoraciones_guardar') }}" method="POST">
                            @csrf
                            <input type="hidden" name="rateable_id" value="{{ $thread->id }}">
                            <input type="hidden" name="rateable_type" value="App\Models\Thread">
                            <!-- IDs únicos para la valoración por hilo -->
                            <input type="hidden" name="rating" id="rating-value-{{ $thread->id }}">
                            <div id="star-rating-{{ $thread->id }}">
                                <span class="star" data-value="1">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="5">&#9733;</span>
                            </div>
                            <button type="submit" class="btn btn-success mt-2">Enviar Valoración</button>
                        </form>
                    </div>

                    <!-- Opciones para editar/eliminar el hilo (solo para el creador) -->
                    @if(Auth::id() === $thread->user->id)
                        <button class="btn btn-warning btn-sm mt-2" onclick="mostrarFormularioEditar({{ $thread->id }})">✏️ Editar</button>

                        <form action="{{ route('hilos_editar', $thread->id) }}" method="POST" id="edit-form-{{ $thread->id }}" style="display: none;">
                            @csrf
                            @method('PUT')
                            <input type="text" class="form-control mt-2" name="titulo" value="{{ $thread->titulo }}">
                            <textarea class="form-control mt-2" name="body">{{ $thread->body }}</textarea>
                            <button type="submit" class="btn btn-success btn-sm mt-2">Guardar cambios</button>
                        </form>

                        <form action="{{ route('hilos_eliminar', $thread->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mt-2">❌ Eliminar</button>
                        </form>
                    @endif

                    <!-- Botón para crear un post -->
                    <button class="btn btn-sm btn-success mt-2" onclick="mostrarFormulario({{ $thread->id }})">✍️ Crear Post</button>
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
                        @foreach($thread->posts as $post)
                            <div class="card mb-3 shadow-sm border-0">
                                <div class="card-body">
                                    <p id="post-body-{{ $post->id }}" class="text-muted">{{ $post->body }}</p>
                                    <small class="text-secondary">
                                        ✍️ Por: {{ $post->user->name }} | 📅 {{ $post->created_at->format('d M Y') }}
                                    </small>

                                    <!-- Opciones de edición y eliminación para el creador del post -->
                                    @if(Auth::id() === $post->user->id)
                                        <div class="mt-2">
                                            <button class="btn btn-warning btn-sm" onclick="toggleEditPostForm({{ $post->id }})">✏️ Editar</button>
                                            <form action="{{ route('posts_eliminar', $post->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">❌ Eliminar</button>
                                            </form>
                                        </div>
                                        <!-- Formulario de edición del post (oculto por defecto) -->
                                        <div id="edit-post-form-{{ $post->id }}" class="mt-2" style="display: none;">
                                            <form action="{{ route('posts_editar', $post->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <textarea class="form-control" name="body" rows="3">{{ $post->body }}</textarea>
                                                <button type="submit" class="btn btn-success btn-sm mt-2">Guardar cambios</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning text-center">Aún no hay hilos en este foro.</div>
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

<!-- Estilos para las estrellas -->
<style>
    .star {
        font-size: 30px;
        cursor: pointer;
        color: gray;
    }
    .star.selected {
        color: gold;
    }
</style>

<!-- Scripts para valoración, creación de posts y edición -->
<script>
    // Asignar event listeners para la valoración de hilos
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[id^="star-rating-"]').forEach(function(ratingContainer) {
            let threadId = ratingContainer.id.split('-')[2];
            let stars = ratingContainer.querySelectorAll('.star');
            let ratingInput = document.getElementById('rating-value-' + threadId);
            stars.forEach(function(star) {
                star.addEventListener('click', function() {
                    let value = this.getAttribute('data-value');
                    ratingInput.value = value;
                    stars.forEach(function(s) { s.classList.remove('selected'); });
                    stars.forEach(function(s, index) {
                        if(index < value){ s.classList.add('selected'); }
                    });
                });
            });
        });
    });

    // Función para mostrar/ocultar el formulario de
    // creación de posts
    function mostrarFormulario(threadId) {
        let formulario = document.getElementById(`formularioPost_${threadId}`);
        formulario.style.display = (formulario.style.display === 'none' || formulario.style.display === '') ? 'block' : 'none';
    }

    // Función para mostrar/ocultar el formulario de edición de hilos
    function mostrarFormularioEditar(threadId) {
        let form = document.getElementById(`edit-form-${threadId}`);
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    }

    // Función para mostrar/ocultar el formulario de edición de posts
    function toggleEditPostForm(postId) {
        let form = document.getElementById(`edit-post-form-${postId}`);
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    }
</script>
@endsection
