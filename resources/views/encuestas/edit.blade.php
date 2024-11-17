<!-- resources/views/encuestas/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Encuesta</h1>

    <form action="{{ route('encuestas.update', $encuesta->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $encuesta->titulo) }}">
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion">{{ old('descripcion', $encuesta->descripcion) }}</textarea>
        </div>

        <button type="submit">Actualizar Encuesta</button>
    </form>
@endsection
