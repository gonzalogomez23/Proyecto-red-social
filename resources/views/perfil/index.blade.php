@extends('layouts.app')

@section('content')
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-center mb-4">Editar perfil: {{ auth()->user()->username }}</h2>
            </div>
            <div class="col-lg-8">
                <form action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Nombre de usuario</label>
                        <input id="username" name="username" type="text" placeholder="Tu nombre de usuario" class="form-control @error('username') border-danger @enderror" value="{{ auth()->user()->username }}">
                        @error('username')
                        <div class="text-danger d-flex align-items-center gap-2 py-2" role="alert">
                        <i class="bi bi-exclamation-circle"></i>
                        <div>{{$message}}</div>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        @csrf
                        <label for="imagen" class="form-label fw-bold">Foto de perfil</label>
                        <input
                            id="imagen"
                            name="imagen"
                            type="file"
                            class="form-control"
                            value=""
                            accept=".jpg, .jpeg, .png"
                        >
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Guardar cambios" class="btn btn-dark btn-outline-light my-3">
                      </div>
                </form>
            </div>
        </div>
    </div>
@endsection
