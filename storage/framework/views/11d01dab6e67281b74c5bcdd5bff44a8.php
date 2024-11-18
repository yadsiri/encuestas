

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($encuesta->titulo); ?></h1>
    <p><?php echo e($encuesta->descripcion); ?></p>

    <h3>Opciones:</h3>

    <form action="<?php echo e(route('encuestas.votar', $encuesta->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php $__currentLoopData = $encuesta->opciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <label>
                    <input type="radio" name="opcion_id" value="<?php echo e($opcion->id); ?>">
                    <?php echo e($opcion->opcion); ?> - <?php echo e($opcion->votos); ?> votos
                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <button type="submit">Votar</button>
    </form>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/show.blade.php ENDPATH**/ ?>