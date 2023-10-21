@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="py-2 border-bottom border-secondary mb-4">
                <h2 class="fw-bold text-center fs-1">Regístrate</h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label fw-bold">Nombre</label>
              <input id="name" name="name" type="text" placeholder="Tu nombre" class="form-control @error('name') border-danger @enderror" value="{{old('name')}}">
              @error('name')
              <div class="text-danger d-flex align-items-center gap-2 py-2" role="alert">
                <i class="bi bi-exclamation-circle"></i>
                <div>{{$message}}</div>
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="username" class="form-label fw-bold">Nombre de usuario</label>
              <input id="username" name="username" type="text" placeholder="Tu nombre de usuario" class="form-control @error('username') border-danger @enderror" value="{{old('username')}}">
              @error('username')
              <div class="text-danger d-flex align-items-center gap-2 py-2" role="alert">
                <i class="bi bi-exclamation-circle"></i>
                <div>{{$message}}</div>
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label fw-bold">Email</label>
              <input id="email" name="email" type="text" placeholder="Tu email" class="form-control @error('email') border-danger @enderror" value="{{old('email')}}">
              @error('email')
              <div class="text-danger d-flex align-items-center gap-2 py-2" role="alert">
                <i class="bi bi-exclamation-circle"></i>
                <div>{{$message}}</div>
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label fw-bold">Contraseña</label>
              <input id="password" name="password" type="password" placeholder="Tu contraseña" class="form-control @error('password') border-danger @enderror">
              @error('password')
              <div class="text-danger d-flex align-items-center gap-2 py-2" role="alert">
                <i class="bi bi-exclamation-circle"></i>
                <div>{{$message}}</div>
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label fw-bold">Repetir contraseña</label>
              <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repite tu contraseña" class="form-control @error('password_confirmation') border-danger @enderror">
              @error('password_confirmation')
              <div class="text-danger d-flex align-items-center gap-2 py-2" role="alert">
                <i class="bi bi-exclamation-circle"></i>
                <div>{{$message}}</div>
              </div>
              @enderror
            </div>
            <div class="text-center">
              <input type="submit" value="Crear cuenta" class="btn btn-dark btn-outline-light my-3">
            </div>
          </form>
        </div>
    </div>
</div>
    
@endsection