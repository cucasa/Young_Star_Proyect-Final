@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-center mb-4">Crear Nuevo Artículo</h2>

    <form action="{{ route('articulos_guardar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Contenido:</label>
            <textarea name="body" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Imagen:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Publicar Artículo</button>
    </form>
</div>
@endsection
