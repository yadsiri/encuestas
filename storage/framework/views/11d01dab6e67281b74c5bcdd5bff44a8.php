

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($encuesta->titulo); ?></h1>
    <p><?php echo e($encuesta->descripcion); ?></p>

    <h3>Opciones:</h3>
    <ul>
        <?php $__currentLoopData = $encuesta->opciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($opcion->opcion); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/show.blade.php ENDPATH**/ ?>