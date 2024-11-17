<!-- resources/views/encuestas/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Encuesta</h1>

    <form action="{{ route('encuestas.store') }}" method="POST">
        @csrf
        <div>
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}">
        </div>
        
        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
        </div>

        <button type="submit">Guardar Encuesta</button>
    </form>
@endsection
