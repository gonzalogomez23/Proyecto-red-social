@extends('layouts.app')

@section('content')
    <section class="container pt-5">
        <div class="row">
            <div class="col-lg-3 offset-lg-3 text-center mb-5 px-5">
                <img src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/profile.svg')}}" alt="" class="w-100 img-fluid img-perfil" width="200">
            </div>
            <div class="col-lg-6 mb-5">
                <h2 class="fs-3 fw-normal mb-4">{{ $user->username }}</h2>

                @auth
                    @if ($user->id === auth()->user()->id)
                        <a href="{{ route('perfil.index') }}" class="btn border mb-4">Editar perfil</a>
                    @else
                    <div class="mb-4">
                        @if (!$user->siguiendo(auth()->user()))
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                @csrf
                                <input type="submit" value="Seguir" class="btn btn-light">
                            </form> 
                        @else
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Dejar de seguir" class="btn btn-light">
                            </form>
                        @endif
                    </div>
                    @endif
                @endauth

                <p>{{ $user->followers->count() }} @choice('follower|followers', $user->followers->count()) </p>
                <p>{{ $user->followings->count() }} following </p>
                <p>{{ $user->posts()->count() }} @choice('post|posts', $user->posts()->count())</p>
            </div>
        </div>
    </section>

    <section class="container pb-4 pt-lg-4">
        <div class="row justify-content-center">
            <h2 class="display-4 fw-light text-uppercase text-center mb-5">Posts</h2>
            <div class="col-xl-10">
                @if($posts->count() != 0)
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-6 col-xl-4 mb-4 card-dashboard">
                            <a href="{{ route('posts.show', ['post' => $post, 'user' => $user ]) }}">
                                <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post '{{ $post->titulo }}'" class="w-100 h-100 img-dashboard">
                            </a>
                        </div>
                    @endforeach
                    <div class="col-12 py-4">
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                @else
                <p>No hay publicaciones</p>
                @endif
            </div>
        </div>
    </section>

@endsection