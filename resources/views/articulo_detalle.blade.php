@extends('layouts.app')

@section('content')
<div class="container py-4 position-relative">
    <!-- Botón para eliminar el artículo en la esquina superior derecha -->
    @if(Auth::id() === $articulo->user_id)
        <form action="{{ route('articulos_eliminar', $articulo->id) }}" method="POST" class="position-absolute top-0 end-0 mt-3 me-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">🗑 Eliminar Artículo</button>
        </form>
    @endif

    <h2 class="fw-bold text-center mb-4">{{ $articulo->title }}</h2>
    <small class="text-muted d-block text-center mb-3">{{ $articulo->created_at->format('d M Y') }}</small>

    <div class="text-center">
        @if($articulo->image)
            <img src="{{ Storage::url($articulo->image) }}" class="img-fluid rounded mb-4" style="max-width: 100%;" alt="{{ $articulo->title }}">
        @endif
    </div>

    <div class="fs-5 lh-lg">
        <p>{{ $articulo->body }}</p>
    </div>

    <hr>

    <!-- Sección de Valoración con estrellas interactivas -->
    <div class="mt-4">
        <h3>⭐ Valora este artículo</h3>

        <form action="{{ route('valoraciones_guardar') }}" method="POST">
            @csrf
            <input type="hidden" name="rateable_id" value="{{ $articulo->id }}">
            <input type="hidden" name="rateable_type" value="App\Models\Article">
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

    <hr>

    <!-- Sección de Comentarios con edición interactiva -->
    <div class="mt-4">
        <h3>📝 Comentarios</h3>
        <form action="{{ route('comentarios_guardar') }}" method="POST">
            @csrf
            <input type="hidden" name="article_id" value="{{ $articulo->id }}">
            <textarea name="comentario" class="form-control mb-3" rows="4" placeholder="Escribe tu comentario aquí..." required></textarea>
            <button type="submit" class="btn btn-primary">Publicar Comentario</button>
        </form>

        <hr>

        @foreach($articulo->comments as $comment)
            <div class="border p-3 mb-3 rounded shadow-sm bg-light position-relative">
                <strong>{{ $comment->user->name }}</strong>
                <span class="text-muted">({{ $comment->created_at->format('d M Y') }})</span>
                <p class="fs-6" id="comment-text-{{ $comment->id }}">{{ $comment->comentario }}</p>

                @if(Auth::id() === $comment->user_id)
                    <!-- Botón para abrir el formulario de edición -->
                    <button class="btn btn-warning btn-sm" onclick="toggleEditForm({{ $comment->id }})">Editar</button>

                    <form action="{{ route('comentarios_editar', $comment->id) }}" method="POST" id="edit-form-{{ $comment->id }}" style="display:none;">
                        @csrf
                        @method('PUT')
                        <textarea name="comentario" class="form-control mt-2">{{ $comment->comentario }}</textarea>
                        <button type="submit" class="btn btn-success btn-sm mt-2">Guardar cambios</button>
                    </form>

                    <!-- Botón para eliminar comentario -->
                    <form action="{{ route('comentarios_eliminar', $comment->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>

    <hr>

    <!-- Botón para volver a la lista de artículos -->
    <a href="{{ route('articulos_index') }}" class="btn btn-secondary">Volver a Artículos</a>
</div>

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
