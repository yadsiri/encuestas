

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Actualizar Encuesta</h1>

    <form action="<?php echo e(route('encuestas.update', $encuesta->id)); ?>" method="POST" class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-6">
            <label for="titulo" class="block text-lg font-medium text-gray-700 mb-2">Título</label>
            <input 
                type="text" 
                name="titulo" 
                id="titulo" 
                value="<?php echo e(old('titulo', $encuesta->titulo)); ?>" 
                class="form-control w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300">
        </div>

        <div class="mb-6">
            <label for="descripcion" class="block text-lg font-medium text-gray-700 mb-2">Descripción</label>
            <textarea 
                name="descripcion" 
                id="descripcion" 
                class="form-control w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300"><?php echo e(old('descripcion', $encuesta->descripcion)); ?></textarea>
        </div>

        <div class="mb-6">
            <label for="categoria" class="block text-lg font-medium text-gray-700 mb-2">Categoría</label>
            <select 
                name="categoria" 
                required 
                class="form-select w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300">
                <option value="tecnología" <?php echo e($encuesta->categoria == 'tecnología' ? 'selected' : ''); ?>>Tecnología</option>
                <option value="educación" <?php echo e($encuesta->categoria == 'educación' ? 'selected' : ''); ?>>Educación</option>
                <option value="salud" <?php echo e($encuesta->categoria == 'salud' ? 'selected' : ''); ?>>Salud</option>
            </select>
        </div>

        <div class="mb-6">
            <label for="opciones" class="block text-lg font-medium text-gray-700 mb-2">Opciones</label>
            <div id="opciones-container">
                <?php $__currentLoopData = $encuesta->opciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input 
                        type="text" 
                        name="opciones[]" 
                        value="<?php echo e(old('opciones[]', $opcion->opcion)); ?>" 
                        class="form-control w-full px-4 py-2 border rounded-lg shadow-sm mt-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button 
                type="button" 
                id="add-option" 
                class="bg-gray-200 text-gray-700 px-4 py-2 mt-3 rounded-lg hover:bg-gray-300 focus:outline-none transition">
                Añadir Opción
            </button>
        </div>

        <button 
            type="submit" 
            class="bg-blue-500 text-white px-6 py-3 rounded-lg mt-6 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition">
            Actualizar Encuesta
        </button>
    </form>
</div>

<script>
    document.getElementById('add-option').addEventListener('click', function() {
        let container = document.getElementById('opciones-container');
        let newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.name = 'opciones[]';
        newInput.classList.add('form-control', 'w-full', 'px-4', 'py-2', 'border', 'rounded-lg', 'shadow-sm', 'mt-2', 'focus:outline-none', 'focus:ring-2', 'focus:ring-blue-300');
        container.appendChild(newInput);
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/edit.blade.php ENDPATH**/ ?>