<form action="<?php echo e(route('encuestas.update', $encuesta->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div>
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo e(old('titulo', $encuesta->titulo)); ?>" class="form-control">
    </div>

    <div>
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control"><?php echo e(old('descripcion', $encuesta->descripcion)); ?></textarea>
    </div>
    <div>
        <label for="categoria">Categoría:</label>
        <select name="categoria" required>
            <option value="tecnología" <?php echo e($encuesta->categoria == 'tecnología' ? 'selected' : ''); ?>>Tecnología</option>
            <option value="educación" <?php echo e($encuesta->categoria == 'educación' ? 'selected' : ''); ?>>Educación</option>
            <option value="salud" <?php echo e($encuesta->categoria == 'salud' ? 'selected' : ''); ?>>Salud</option>
        </select>
    </div>
    
    <div>
        <label for="opciones">Opciones</label>
        <div id="opciones-container">
            <?php $__currentLoopData = $encuesta->opciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="text" name="opciones[]" value="<?php echo e(old('opciones[]', $opcion->opcion)); ?>" class="form-control mt-2">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/edit.blade.php ENDPATH**/ ?>