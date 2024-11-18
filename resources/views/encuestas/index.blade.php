@extends('layouts.app')

@section('content')
    <h1>Listado de Encuestas</h1>
    
    <!-- Botón para crear una nueva encuesta -->
    <a href="{{ route('encuestas.create') }}">Crear Nueva Encuesta</a>

    <!-- Mostrar mensajes de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario de búsqueda y filtro -->
    <form method="GET" action="{{ route('encuestas.index') }}">
        <div>
            <label for="search">Buscar por título o descripción:</label>
            <input type="text" name="search" placeholder="Escribe aquí..." value="{{ request('search') }}">
        </div>
        <div>
            <label for="category">Filtrar por categoría:</label>
            <select name="category">
                <option value="">Selecciona una categoría</option>
                <option value="tecnología" {{ request('category') == 'tecnología' ? 'selected' : '' }}>Tecnología</option>
                <option value="educación" {{ request('category') == 'educación' ? 'selected' : '' }}>Educación</option>
                <option value="salud" {{ request('category') == 'salud' ? 'selected' : '' }}>Salud</option>
            </select>
        </div>
        <button type="submit">Buscar</button>
    </form>
    <!-- Tabla de encuestas -->
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($encuestas as $encuesta)
                <tr>
                    <td>{{ $encuesta->titulo }}</td>
                    <td>{{ $encuesta->descripcion }}</td>
                    <td>{{ $encuesta->categoria }}</td>
                    <td>
                        <a href="{{ route('encuestas.show', $encuesta->id) }}">Ver</a>
                        <a href="{{ route('encuestas.edit', $encuesta->id) }}">Editar</a>
                        <form action="{{ route('encuestas.destroy', $encuesta->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $encuesta->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDeletion({{ $encuesta->id }})">Eliminar</button>
                        </form>                        
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No se encontraron encuestas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script>
        // Función para mostrar el cuadro de confirmación
        function confirmDeletion(encuestaId) {
            // Mostrar el cuadro de confirmación
            if (confirm('¿Seguro que quieres eliminar esta encuesta?')) {
                // Si el usuario acepta, enviar el formulario de eliminación
                document.getElementById('delete-form-' + encuestaId).submit();
            }
        }
    </script>

    <!-- Paginación -->
    {{ $encuestas->links() }}
@endsection
