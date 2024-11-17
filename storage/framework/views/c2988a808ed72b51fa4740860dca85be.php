<!-- resources/views/encuestas/edit.blade.php -->


<?php $__env->startSection('content'); ?>
    <h1>Editar Encuesta</h1>

    <form action="<?php echo e(route('encuestas.update', $encuesta->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <div>
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo e(old('titulo', $encuesta->titulo)); ?>">
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion"><?php echo e(old('descripcion', $encuesta->descripcion)); ?></textarea>
        </div>

        <button type="submit">Actualizar Encuesta</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/edit.blade.php ENDPATH**/ ?>