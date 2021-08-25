<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de pacientes</title>
</head>
<body>
    <div>
        Menu: 
        <ul>
            <li><a href="<?php echo e(route('pacientes.index')); ?>">Pacientes</a></li>
            <li><a href="<?php echo e(route('consultas.index')); ?>">Consultas</a></li>
        </ul>
    </div>

    
    <h1>Lista de consultas</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Diagnóstico</th>
                <th>Receta</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php $__currentLoopData = $consultas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consulta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
            <tr>
                <td><?php echo e($consulta->id); ?></td>
                <td><?php echo e($consulta->diagnostico); ?></td>
                <td><?php echo e($consulta->receta); ?></td>
                <td><?php echo e($consulta->created_at); ?></td>
                <td>
                    <a href="<?php echo e(route('consultas.show', $consulta->id)); ?>">Ver detalles</a>
                    <a href="<?php echo e(route('consultas.edit', $consulta->id)); ?>">Editar</a>
                    <form onsubmit="return confirmarBorrado()" class="form-borrar" action="<?php echo e(route('consultas.destroy', $consulta->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
    <a href="<?php echo e(route('consultas.create')); ?>">Registrar consulta</a>
    <script>
// Aquí viene el código Javascript
// elems = document.getElementsByTagName("form");
// console.log(elems);

function confirmarBorrado() {
    var confirmacion = confirm("Está seguro de borrar este registro?");
    if (confirmacion) {
        return true;
    }
    else {
        return false;
    }
}
    </script>
</body>
</html><?php /**PATH C:\laragon\www\Sisdental\resources\views/consultas/index.blade.php ENDPATH**/ ?>