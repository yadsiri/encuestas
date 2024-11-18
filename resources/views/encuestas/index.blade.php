@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center mb-6">Listado de Encuestas</h1>
    
    <!-- Botón para crear una nueva encuesta -->
    <div class="text-center mb-4">
        <a href="{{ route('encuestas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Crear Nueva Encuesta</a>
    </div>

    <!-- Mostrar mensajes de éxito -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario de búsqueda y filtro -->
    <form method="GET" action="{{ route('encuestas.index') }}" class="mb-6">
        <div class="flex flex-wrap items-center justify-center gap-4">
            <div>
                <label for="search" class="block text-sm font-medium">Buscar:</label>
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Título o descripción..." 
                    value="{{ request('search') }}" 
                    class="form-control w-64 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div>
                <label for="category" class="block text-sm font-medium">Categoría:</label>
                <select 
                    name="category" 
                    class="form-select w-64 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">Selecciona una categoría</option>
                    <option value="tecnología" {{ request('category') == 'tecnología' ? 'selected' : '' }}>Tecnología</option>
                    <option value="educación" {{ request('category') == 'educación' ? 'selected' : '' }}>Educación</option>
                    <option value="salud" {{ request('category') == 'salud' ? 'selected' : '' }}>Salud</option>
                </select>
            </div>
            <div>
                <button 
                    type="submit" 
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Buscar
                </button>
            </div>
        </div>
    </form>

    <!-- Tabla de encuestas -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full text-left border-collapse bg-white rounded-lg shadow-lg">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-2">Título</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Categoría</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($encuestas as $encuesta)
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2">{{ $encuesta->titulo }}</td>
                        <td class="border px-4 py-2">{{ $encuesta->descripcion }}</td>
                        <td class="border px-4 py-2">{{ $encuesta->categoria }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('encuestas.show', $encuesta->id) }}" class=" bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Ver</a>
                            <a href="{{ route('encuestas.edit', $encuesta->id) }}" class=" bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Editar</a>
                            <form action="{{ route('encuestas.destroy', $encuesta->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $encuesta->id }}">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="button" 
                                    onclick="confirmDeletion({{ $encuesta->id }})" 
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No se encontraron encuestas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-6">
        {{ $encuestas->links('pagination::tailwind') }}
    </div>
</div>

<script>
    // Función para mostrar el cuadro de confirmación
    function confirmDeletion(encuestaId) {
        if (confirm('¿Seguro que quieres eliminar esta encuesta?')) {
            document.getElementById('delete-form-' + encuestaId).submit();
        }
    }
</script>
@endsection

