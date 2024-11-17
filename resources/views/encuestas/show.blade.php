@extends('layouts.app')

@section('content')
    <h1>{{ $encuesta->titulo }}</h1>
    <p>{{ $encuesta->descripcion }}</p>

    <h3>Opciones:</h3>
    <ul>
        @foreach($encuesta->opciones as $opcion)
            <li>{{ $opcion->opcion }}</li>
        @endforeach
    </ul>
@endsection
