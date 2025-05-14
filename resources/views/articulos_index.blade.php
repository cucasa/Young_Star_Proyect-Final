@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">📖 Artículos Recientes</h2>

    <div class="col-md-8 mx-auto">
        @forelse($articulos as $articulo)
            <div class="mb-4 p-4 border rounded shadow-sm bg-light">
                <small class="text-muted">{{ $articulo->created_at->format('d M Y') }}</small>
                <h2 class="fw-bold mt-2">{{ $articulo->title }}</h2>

                @if($articulo->image)
                    <img src="{{ Storage::url($articulo->image) }}" class="w-100 mb-3 rounded" alt="{{ $articulo->title }}">
                @endif

                <p class="text-muted">{{ Str::limit($articulo->body, 250) }}</p>

<a href="{{ route('articulo_detalle', $articulo->id) }}" class="btn btn-primary">Leer más...</a>


            </div>
        @empty
            <div class="alert alert-warning text-center">⚠️ No hay artículos disponibles.</div>
        @endforelse
    </div>
</div>
@endsection
