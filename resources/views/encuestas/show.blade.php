<!-- resources/views/encuestas/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $encuesta->titulo }}</h1>
    <p>{{ $encuesta->descripcion }}</p>

    <a href="{{ route('encuestas.index') }}">Volver a la lista</a>
@endsection
