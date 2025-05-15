@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">💬 Hilo: {{ $forum->name }}</h2>

    <div id="hilos-lista">
        @forelse($forum->threads as $thread)
            <div class="card mb-3 shadow-sm border-0">
                <div class="card-body">
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
        <input type="hidden" name="rating" id="rating-value">

        <div id="star-rating">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
        </div>

        <button type="submit" class="btn btn-success mt-2">Enviar Valoración</button>
    </form>
</div>





                    @if(Auth::id() === $thread->user_id)
                        <button class="btn btn-warning btn-sm mt-2" onclick="mostrarFormularioEditar({{ $thread->id }})">Editar</button>

                        <form action="{{ route('hilos_editar', $thread->id) }}" method="POST" id="edit-form-{{ $thread->id }}" style="display:none;">
                            @csrf
                            @method('PUT')
                            <input type="text" class="form-control mt-2" name="titulo" value="{{ $thread->titulo }}">
                            <textarea class="form-control mt-2" name="body">{{ $thread->body }}</textarea>
                            <button type="submit" class="btn btn-success btn-sm mt-2">Guardar cambios</button>
                        </form>

                        <form action="{{ route('hilos_eliminar', $thread->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mt-2">Eliminar</button>
                        </form>
                    @endif

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
                                    <p class="text-muted">{{ $post->body }}</p>
                                    <small class="text-secondary">
                                        ✍️ Por: {{ $post->user->name }} | 📅 {{ $post->created_at->format('d M Y') }}
                                    </small>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let threads = document.querySelectorAll("[id^='star-rating-']");

        threads.forEach(thread => {
            let threadId = thread.id.split('-')[2];
            let stars = document.querySelectorAll(`#star-rating-${threadId} .star-box`);
            let ratingValue = document.getElementById(`rating-value-${threadId}`);

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    let value = this.getAttribute('data-value');
                    ratingValue.value = value;

                    stars.forEach(s => s.classList.remove('selected'));
                    for (let i = 0; i < value; i++) {
                        stars[i].classList.add('selected');
                    }
                });
            });
        });
    });

    function mostrarFormulario(threadId) {
        let formulario = document.getElementById(`formularioPost_${threadId}`);
        formulario.style.display = formulario.style.display === "none" ? "block" : "none";
    }

    function mostrarFormularioEditar(threadId) {
        document.getElementById(`edit-form-${threadId}`).style.display = "block";
    }
</script>


<!-- Estilos y Script -->
<style>
    #star-rating {
        font-size: 30px;
        cursor: pointer;
        color: gray;
    }
    .star.selected {
        color: gold;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let stars = document.querySelectorAll('.star');
        let ratingValue = document.getElementById('rating-value');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                let value = this.getAttribute('data-value');
                ratingValue.value = value;

                // Resaltar las estrellas seleccionadas
                stars.forEach(s => s.classList.remove('selected'));
                for (let i = 0; i < value; i++) {
                    stars[i].classList.add('selected');
                }
            });
        });
    });

    function toggleEditForm(commentId) {
        let form = document.getElementById(`edit-form-${commentId}`);
        form.style.display = form.style.display === "none" ? "block" : "none";
    }
</script>


@endsection
