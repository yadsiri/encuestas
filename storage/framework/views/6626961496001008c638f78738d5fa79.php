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
                <h3 class="text-lg font-semibold text-gray-900">Bienvenido a tu Dashboard</h3>
                <p class="mt-2 text-gray-600">Aquí puedes administrar todas las encuestas.</p>
            </div>

            <!-- Botones para navegar entre las encuestas -->
            <div class="mt-6 space-x-4 flex">
                <a href="<?php echo e(route('encuestas.index')); ?>" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300">
                    Ver Encuestas
                </a>
                <a href="<?php echo e(route('encuestas.create')); ?>" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-300">
                    Crear Encuesta
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/dashboard.blade.php ENDPATH**/ ?>