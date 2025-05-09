@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">📝 Crear un Nuevo Artículo</h2>

    <div class="p-4 border rounded bg-light">
        <form action="{{ route('articulos_guardar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título del Artículo</label>
                <input type="text" class="form-control shadow-sm" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Contenido</label>
                <textarea class="form-control shadow-sm" id="body" name="body" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen del Artículo</label>
                <input type="file" class="form-control shadow-sm" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-success w-100">✨ Publicar Artículo</button>
        </form>
    </div>
</div>
@endsection
