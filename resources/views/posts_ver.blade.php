@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="text-center mb-4">💬 Hilo: {{ $thread->titulo }}</h2>
    <p class="text-muted">{{ $thread->body }}</p>
    <small class="text-secondary">
        📝 Creado por: {{ $thread->user->name }} | 📅 {{ $thread->created_at->format('d M Y') }}
    </small>

    <!-- Botón para desplegar el formulario -->
    <button class="btn btn-success mt-3" onclick="mostrarFormulario()">✍️ Escribir un Post</button>

    <!-- Formulario oculto para escribir un post -->
    <div id="formularioPost" class="mt-4 p-4 border rounded bg-light" style="display: none;">
        <h4>✍️ Responder al Hilo</h4>
        <form id="formPost">
            @csrf
            <input type="hidden" name="thread_id" id="thread_id" value="{{ $thread->id }}">
            <div class="mb-3">
                <label for="body" class="form-label">Tu Respuesta</label>
                <textarea class="form-control shadow-sm" id="body" name="body" rows="3" required></textarea>
            </div>
            <button type="button" class="btn btn-primary w-100" onclick="enviarPost()">💬 Publicar</button>
        </form>
    </div>

    <!-- Mostrar los posts existentes abajo del hilo -->
    <div id="posts-lista" class="mt-4">
        @forelse($thread->posts as $post)
            <div class="card mb-3 shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted">{{ $post->body }}</p>
                    <small class="text-secondary">
                        ✍️ Por: {{ $post->user->name }} | 📅 {{ $post->created_at->format('d M Y') }}
                    </small>
                </div>
            </div>
        @empty
            <div class="alert alert-warning text-center">⚠️ No hay respuestas en este hilo aún.</div>
        @endforelse
    </div>
</div>

<script>
    function mostrarFormulario() {
        document.getElementById("formularioPost").style.display = "block";
    }

    function enviarPost() {
        let body = document.getElementById("body").value;
        let thread_id = document.getElementById("thread_id").value;

        fetch("{{ route('guardar_post') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            },
            body: JSON.stringify({
                body: body,
                thread_id: thread_id
            })
        })
        .then(response => response.json())
        .then(data => {
            let postsLista = document.getElementById("posts-lista");
            let nuevoPost = document.createElement("div");
            nuevoPost.classList.add("card", "mb-3", "shadow-sm", "border-0");
            nuevoPost.innerHTML = `
                <div class="card-body">
                    <p class="text-muted">${data.body}</p>
                    <small class="text-secondary">✍️ Por: ${data.user} | 📅 ${data.created_at}</small>
                </div>
            `;
            postsLista.appendChild(nuevoPost);
            document.getElementById("body").value = ""; // ✅ Limpiar campo después de enviar
        })
        .catch(error => console.error("Error al enviar el post:", error));
    }
</script>
@endsection
