@extends('layouts.app')
@section('contingut')
<div class="container text-center" style="margin-top: 100px;">
    <h1 style="font-size: 80px;">404</h1>
    <h2>Página no encontrada</h2>
    <p>Lo sentimos, la página que buscas no existe.</p>
    <a href="{{ url('/') }}" class="btn btn-secondary">
        Volver al inicio
    </a>
</div>
@endsection
