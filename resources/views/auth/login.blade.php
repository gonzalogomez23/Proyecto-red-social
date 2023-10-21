@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="py-2 border-bottom border-secondary mb-4">
                <h2 class="fw-bold text-center fs-1">Iniciar sesión</h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <form action="{{ route('login') }}" method="POST">
            @csrf

            @if(session('mensaje'))
                <div class="text-danger d-flex align-items-center gap-2 py-2" role="alert">
                    <i class="bi bi-exclamation-circle"></i>
                    <div>{{session('mensaje')}}</div>
                </div>
            @endif

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

            <div>
              <input type="checkbox" name="remember"><label class="ms-2">Mantener mi sesión abierta</label>
            </div>

            <div class="text-center">
              <input type="submit" value="Iniciar sesión" class="btn btn-dark btn-outline-light my-3">
            </div>
          </form>
        </div>
    </div>
</div>
    
@endsection