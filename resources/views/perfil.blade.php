@extends('layouts.app')

@section('content')

<div class="container py-4">
    <h1 class="text-center mb-4">👤 Perfil de Usuario</h1>

    <div class="card mx-auto mb-4 shadow-lg" style="max-width: 600px;">
        <div class="card-body">
            <h5 class="card-title text-primary">Información Personal</h5>
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $user->email }}</p>
            <p><strong>Fecha de Registro:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('foroC') }}" class="btn btn-success btn-lg">📝 Crear un Foro</a>
        <a href="{{ route('articulos_formulario') }}" class="btn btn-primary btn-lg">📝 Crear un Artículo</a> <!-- Nuevo botón -->
        <form action="{{ route('cerrar_sesion') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-lg">🔒 Cerrar sesión</button>
        </form>
    </div>
</div>

@endsection
