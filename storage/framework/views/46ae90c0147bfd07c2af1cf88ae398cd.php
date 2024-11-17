<!-- resources/views/encuestas/create.blade.php -->


<?php $__env->startSection('content'); ?>
    <h1>Crear Nueva Encuesta</h1>

    <form action="<?php echo e(route('encuestas.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo e(old('titulo')); ?>">
        </div>
        
        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion"><?php echo e(old('descripcion')); ?></textarea>
        </div>

        <button type="submit">Guardar Encuesta</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/create.blade.php ENDPATH**/ ?>