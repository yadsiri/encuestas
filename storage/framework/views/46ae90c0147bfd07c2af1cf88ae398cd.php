

<?php $__env->startSection('content'); ?>
    <h1>Crear Nueva Encuesta</h1>

    <form action="<?php echo e(route('encuestas.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo e(old('titulo')); ?>" required>
        </div>
        
        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion"><?php echo e(old('descripcion')); ?>"></textarea>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/create.blade.php ENDPATH**/ ?>