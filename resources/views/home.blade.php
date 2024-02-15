@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-5 text-center">Página principal</h2>
            </div>
        </div>
        <div class="row">
            <x-listar-posts :posts="$posts" />
        </div>
    </div>
@endsection