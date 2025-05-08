@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">🌟 Foros Creados</h2>

    @if($foros->isEmpty())
        <div class="alert alert-warning text-center">⚠️ No hay foros creados aún.</div>
    @else
        <div class="row">
            @foreach($foros as $foro)
                <div class="col-md-6">
                    <a href="{{ route('ver_hilos', $foro->id) }}" class="text-decoration-none">
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title text-primary">{{ $foro->name }}</h4>
                                <p class="card-text text-muted">{{ $foro->description }}</p>
                                <span class="badge bg-info">{{ $foro->category->nombre }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
