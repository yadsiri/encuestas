@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Encuesta</h1>

    <form action="{{ route('encuestas.store') }}" method="POST">
        @csrf
        <div>
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        </div>
        
        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion">{{ old('descripcion') }}"></textarea>
        </div>
        <div>
            <label for="categoria">Categoría:</label>
            <select name="categoria" required>
                <option value="tecnología">Tecnología</option>
                <option value="educación">Educación</option>
                <option value="salud">Salud</option>
            </select>
        </div>        
        <div id="opciones-container">
            <label>Opciones</label>
            <div>
                <input type="text" name="opciones[]" placeholder="Opción 1" required>
            </div>
            <div>
                <input type="text" name="opciones[]" placeholder="Opción 2" required>
            </div>
        </div>
        <button type="button" id="add-opcion">Añadir Opción</button>
        
        <button type="submit">Guardar Encuesta</button>
    </form>

    <script>
        document.getElementById('add-opcion').addEventListener('click', function () {
            const container = document.getElementById('opciones-container');
            const newOption = document.createElement('div');
            newOption.innerHTML = '<input type="text" name="opciones[]" placeholder="Nueva Opción" required>';
            container.appendChild(newOption);
        });
    </script>
@endsection

