@extends('layouts.app') @push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush @section('content')
<div class="container py-5">
	<div class="row">
		<div class="col-12">
			<h2 class="h1 text-center mb-5">Creando nueva publicación</h2>
		</div>
		<div class="col-lg-6 px-5 mb-4">
			<form action="{{ route('imagenes.store') }}" method="POST" enctype="" id="dropzone"
				class="dropzone bg-dark w-100 h-100 d-flex justify-content-center align-items-center">
				@csrf
			</form>
		</div>
		<div class="col-lg-6">
			<form action="{{ route('posts.store') }}" method="POST">
				@csrf
				<div class="mb-3">
					<label for="titulo" class="form-label fw-bold">
						Título
					</label>
					<input id="titulo" name="titulo" type="text" placeholder="Título del post"
						class="form-control @error('titulo') border-danger @enderror" value="{{ old('titulo') }}" />
					@error('titulo')
					<div class="text-danger d-flex align-items-center gap-2 py-2" role="alert">
						<i class="bi bi-exclamation-circle"></i>
						<div>{{ $message }}</div>
					</div>
					@enderror
				</div>
				<div class="mb-3">
					<label for="descripcion" class="form-label fw-bold">
						Descripción
					</label>
					<textarea id="descripcion" name="descripcion" placeholder="Descripción del post"
						class="form-control @error('descripcion') border-danger @enderror">{{ old("descripcion") }}</textarea>
					@error('descripcion')
					<div class="text-danger d-flex align-items-center gap-2 py-2" role="alert">
						<i class="bi bi-exclamation-circle"></i>
						<div>{{ $message }}</div>
					</div>
					@enderror
				</div>
				<div>
					<input name="imagen" type="hidden" value="{{old('imagen')}}"/>
                    @error('imagen')
					<div class="text-danger d-flex align-items-center gap-2 py-2" role="alert">
						<i class="bi bi-exclamation-circle"></i>
						<div>{{ $message }}</div>
					</div>
					@enderror
				</div>
				<input type="submit" value="Crear publicación" class="btn btn-outline-light my-3" />
			</form>
		</div>
	</div>
</div>
@endsection