@extends('layouts.app')

@section('titulo')
    
@endsection
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 px-lg-4">
                <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post '{{ $post->titulo }}'" class="img-fluid w-100 mb-3">
                <div class="d-flex align-items-center justify-content-between pb-3 px-2">
                    <p class="text-secondary mb-0">{{ $post->created_at->toFormattedDateString() }}</p>
                    <div class="d-flex align-items-center gap-2">
                        <span class="fs-5">{{ $post->likes()->count() }} likes</span>
                        @auth
                            @if ( $post->checkLike(auth()->user()) )
                                <form action="{{ route('posts.likes.destroy', $post) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn">
                                        <i class="bi bi-heart-fill fs-3 text-danger"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('posts.likes.store', $post) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn">
                                        <i class="bi bi-heart fs-3"></i>
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="d-flex justify-content-between pb-3 border-bottom border-secondary mb-3">
                    <h2 class="mb-0 fs-3">{{ $post->titulo }}</h2>
                    @auth
                        @if ($post->user_id === auth()->user()->id)
                            <div class="btn-group dropend">
                                <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical fs-4 text-white"></i>
                                </button>
                                <div class="dropdown-menu rounded-0 py-0 mt-1">
                                    <div class="dropdown-item py-2">
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" value="Eliminar Publicación" class="input-eliminar-publicacion">
                                        </form>
                                        {{-- Eliminar publicación <i class="bi bi-trash3 ms-2"></i> --}}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
                <p>{{ $post->descripcion }}</p>
            </div>
            <div class="col-lg-6 px-lg-4 h-100">
                <div class="caja-comentarios rounded-4 px-4 py-3 h-100">
                    <p class="fs-2 fw-bold">Comentarios</p>
                    
                    <div class="flex-grow-1">
                        @if ($post->comentarios->count())
                            @foreach ($post->comentarios as $comentario)
                            <div class="d-flex gap-2">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="text-white text-decoration-none">
                                    <p class="fw-bold mb-1">{{ $comentario->user->username }}</p>
                                </a>
                                <p class="fw-light mb-1">{{ $comentario->comentario }}</p>
                            </div>
                            <p class="fw-light fs-6 text-secondary text-end">{{ $comentario->created_at->diffForHumans() }}</p>
                            @endforeach
                        @else
                            <p>Todavía no han comentado en esta publicación</p>
                        @endif
                    </div>

                    @auth
                        <form action="{{ route('comentarios.store', ['post' => $post]) }}" method="POST" class="d-flex flex-column align-items-end">
                            @csrf
                            <label for="comentario" class="form-label w-100 d-none">Añade un comentario</label>
                            <textarea id="comentario" name="comentario" placeholder="Agregue un comentario" class="form-control @error('comentario') border-danger @enderror">{{ old("comentario") }}</textarea>
                            @error('comentario')
                            <div class="text-danger d-flex align-items-center gap-2 py-2" role="alert">
                                <i class="bi bi-exclamation-circle"></i>
                                <div>{{ $message }}</div>
                            </div>
                            @enderror
                            <input type="submit" value="Comentar" class="btn btn-outline-light my-3 ms-auto" />
                        </form>
                        @if(session('mensaje'))
                            <div class="d-flex gap-3 align-items-center">
                                <p class="mb-0">{{ session('mensaje') }}</p><i class="bi bi-hand-thumbs-up"></i>
                            </div>
                        @endif
                    @else
                        <p>Inicia sesión para poder comentar en esta publicación</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection