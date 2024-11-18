

<?php $__env->startSection('content'); ?>
    <h1>Listado de Encuestas</h1>
    
    <!-- Botón para crear una nueva encuesta -->
    <a href="<?php echo e(route('encuestas.create')); ?>">Crear Nueva Encuesta</a>

    <!-- Mostrar mensajes de éxito -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Formulario de búsqueda y filtro -->
    <form method="GET" action="<?php echo e(route('encuestas.index')); ?>">
        <div>
            <label for="search">Buscar por título o descripción:</label>
            <input type="text" name="search" placeholder="Escribe aquí..." value="<?php echo e(request('search')); ?>">
        </div>
        <div>
            <label for="category">Filtrar por categoría:</label>
            <select name="category">
                <option value="">Selecciona una categoría</option>
                <option value="tecnología" <?php echo e(request('category') == 'tecnología' ? 'selected' : ''); ?>>Tecnología</option>
                <option value="educación" <?php echo e(request('category') == 'educación' ? 'selected' : ''); ?>>Educación</option>
                <option value="salud" <?php echo e(request('category') == 'salud' ? 'selected' : ''); ?>>Salud</option>
            </select>
        </div>
        <button type="submit">Buscar</button>
    </form>
    <!-- Tabla de encuestas -->
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $encuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encuesta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($encuesta->titulo); ?></td>
                    <td><?php echo e($encuesta->descripcion); ?></td>
                    <td><?php echo e($encuesta->categoria); ?></td>
                    <td>
                        <a href="<?php echo e(route('encuestas.show', $encuesta->id)); ?>">Ver</a>
                        <a href="<?php echo e(route('encuestas.edit', $encuesta->id)); ?>">Editar</a>
                        <form action="<?php echo e(route('encuestas.destroy', $encuesta->id)); ?>" method="POST" style="display:inline;" id="delete-form-<?php echo e($encuesta->id); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="button" onclick="confirmDeletion(<?php echo e($encuesta->id); ?>)">Eliminar</button>
                        </form>                        
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3">No se encontraron encuestas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script>
        // Función para mostrar el cuadro de confirmación
        function confirmDeletion(encuestaId) {
            // Mostrar el cuadro de confirmación
            if (confirm('¿Seguro que quieres eliminar esta encuesta?')) {
                // Si el usuario acepta, enviar el formulario de eliminación
                document.getElementById('delete-form-' + encuestaId).submit();
            }
        }
    </script>

    <!-- Paginación -->
    <?php echo e($encuestas->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Encuestas\resources\views/encuestas/index.blade.php ENDPATH**/ ?>