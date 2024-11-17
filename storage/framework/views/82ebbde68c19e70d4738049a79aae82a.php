<!-- resources/views/encuestas/index.blade.php -->



<?php $__env->startSection('content'); ?>
    <h1>Listado de Encuestas</h1>
    
    <a href="<?php echo e(route('encuestas.create')); ?>">Crear Nueva Encuesta</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $encuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encuesta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($encuesta->titulo); ?></td>
                    <td><?php echo e($encuesta->descripcion); ?></td>
                    <td>
                        <a href="<?php echo e(route('encuestas.show', $encuesta->id)); ?>">Ver</a>
                        <a href="<?php echo e(route('encuestas.edit', $encuesta->id)); ?>">Editar</a>
                        <form action="<?php echo e(route('encuestas.destroy', $encuesta->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/index.blade.php ENDPATH**/ ?>