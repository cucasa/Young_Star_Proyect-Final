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


<form action="{{ route('perfil_eliminar') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar tu cuenta? Esta acción es irreversible.')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger w-100">Eliminar Cuenta</button>
</form>





<!-- ✅ Formulario para cambiar solo el nombre -->
<form action="{{ route('perfil_actualizar_nombre') }}" method="POST">
    @csrf @method('PATCH')
    <input type="text" name="name" class="form-control mb-2" placeholder="Nuevo nombre" required>
    <button type="submit" class="btn btn-success w-100">Actualizar nombre</button>
</form>

<!-- ✅ Formulario para cambiar solo el correo -->
<form action="{{ route('perfil_actualizar_email') }}" method="POST">
    @csrf @method('PATCH')
    <input type="email" name="email" class="form-control mb-2" placeholder="Nuevo correo" required>
    <button type="submit" class="btn btn-primary w-100">Actualizar correo</button>
</form>

<!-- ✅ Formulario para cambiar solo la contraseña -->
<form action="{{ route('perfil_actualizar_password') }}" method="POST">
    @csrf @method('PATCH')
    <input type="password" name="password" class="form-control mb-2" placeholder="Nueva contraseña (mín. 8 caracteres)" required>
    <button type="submit" class="btn btn-danger w-100">Actualizar contraseña</button>
</form>





<form action="{{ route('perfil_actualizar_completo') }}" method="POST">
    @csrf @method('PUT')
    <input type="text" name="name" class="form-control mb-2" placeholder="Nuevo nombre" required>
    <input type="email" name="email" class="form-control mb-2" placeholder="Nuevo correo" required>
    <input type="password" name="password" class="form-control mb-2" placeholder="Nueva contraseña (mín. 8 caracteres)" required>
    <button type="submit" class="btn btn-primary w-100">Actualizar todo</button>
</form>


@endsection
