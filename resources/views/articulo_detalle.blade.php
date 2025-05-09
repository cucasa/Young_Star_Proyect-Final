@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-center mb-4">{{ $articulo->title }}</h2>
    <small class="text-muted d-block text-center mb-3">{{ $articulo->created_at->format('d M Y') }}</small>

    <div class="text-center">
        @if($articulo->image)
            <img src="{{ Storage::url($articulo->image) }}" class="img-fluid rounded mb-4" style="max-width: 859%;" alt="{{ $articulo->title }}">
        @endif
    </div>

    <div class="fs-5 lh-lg">
        <p>{{ $articulo->body }}</p>
    </div>

    <hr>

    <!-- Sección de Valoración -->
    <div class="mt-4">
        <h3>⭐ Valora este artículo</h3>
        <form action="{{ route('valoraciones_guardar') }}" method="POST">
            @csrf
            <input type="hidden" name="article_id" value="{{ $articulo->id }}">
            <select name="rating" class="form-select w-25">
                <option value="1">⭐ 1 estrella</option>
                <option value="2">⭐⭐ 2 estrellas</option>
                <option value="3">⭐⭐⭐ 3 estrellas</option>
                <option value="4">⭐⭐⭐⭐ 4 estrellas</option>
                <option value="5">⭐⭐⭐⭐⭐ 5 estrellas</option>
            </select>
            <button type="submit" class="btn btn-success mt-2">Enviar Valoración</button>
        </form>
    </div>

    <hr>

    <!-- Sección de Comentarios -->
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
            <div class="border p-3 mb-3 rounded shadow-sm bg-light">
                <strong>{{ $comment->user->name }}</strong> <span class="text-muted">({{ $comment->created_at->format('d M Y') }})</span>
                <p class="fs-6">{{ $comment->comentario }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
