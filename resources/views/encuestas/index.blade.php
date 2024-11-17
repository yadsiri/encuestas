<!-- resources/views/encuestas/index.blade.php -->
@extends('layouts.app')


@section('content')
    <h1>Listado de Encuestas</h1>
    
    <a href="{{ route('encuestas.create') }}">Crear Nueva Encuesta</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($encuestas as $encuesta)
                <tr>
                    <td>{{ $encuesta->titulo }}</td>
                    <td>{{ $encuesta->descripcion }}</td>
                    <td>
                        <a href="{{ route('encuestas.show', $encuesta->id) }}">Ver</a>
                        <a href="{{ route('encuestas.edit', $encuesta->id) }}">Editar</a>
                        <form action="{{ route('encuestas.destroy', $encuesta->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
