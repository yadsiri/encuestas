<!-- resources/views/encuestas/show.blade.php -->


<?php $__env->startSection('content'); ?>
    <h1><?php echo e($encuesta->titulo); ?></h1>
    <p><?php echo e($encuesta->descripcion); ?></p>

    <a href="<?php echo e(route('encuestas.index')); ?>">Volver a la lista</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/show.blade.php ENDPATH**/ ?>