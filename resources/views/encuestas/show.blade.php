@extends('layouts.app')

@section('content')
    <h1>{{ $encuesta->titulo }}</h1>
    <p>{{ $encuesta->descripcion }}</p>

    <h3>Opciones:</h3>

    <form action="{{ route('encuestas.votar', $encuesta->id) }}" method="POST">
        @csrf
        @foreach ($encuesta->opciones as $opcion)
            <div>
                <label>
                    <input type="radio" name="opcion_id" value="{{ $opcion->id }}">
                    {{ $opcion->opcion }} - {{ $opcion->votos }} votos
                </label>
            </div>
        @endforeach

        <button type="submit">Votar</button>
    </form>

@endsection

