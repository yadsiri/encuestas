<?php $__env->startSection('content'); ?> <!-- Define el contenido que se inyecta en el layout -->
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Componente de bienvenida o cualquier otra información -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold">Bienvenido a tu Dashboard</h3>
                <p class="mt-2">Aquí puedes administrar todas las encuestas.</p>
            </div>

            <!-- Botones para navegar entre las encuestas -->
            <div class="mt-6 space-x-4">
                <a href="<?php echo e(route('encuestas.index')); ?>" class="btn btn-primary">Ver Encuestas</a>
                <a href="<?php echo e(route('encuestas.create')); ?>" class="btn btn-success">Crear Encuesta</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/dashboard.blade.php ENDPATH**/ ?>