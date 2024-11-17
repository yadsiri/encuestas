<form action="{{ route('encuestas.update', $encuesta->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $encuesta->titulo) }}" class="form-control">
    </div>

    <div>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $encuesta->descripcion) }}</textarea>
    </div>

    <div>
        <label for="opciones">Opciones</label>
        <div id="opciones-container">
            @foreach ($encuesta->opciones as $opcion)
                <input type="text" name="opciones[]" value="{{ old('opciones[]', $opcion->opcion) }}" class="form-control mt-2">
            @endforeach
        </div>
        <button type="button" id="add-option" class="btn btn-secondary mt-3">Añadir Opción</button>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Actualizar Encuesta</button>
</form>

<script>
    document.getElementById('add-option').addEventListener('click', function() {
        let container = document.getElementById('opciones-container');
        let newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = 'opciones[]';
        newInput.classList.add('form-control', 'mt-2');
        container.appendChild(newInput);
    });
</script>
