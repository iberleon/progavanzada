<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <title>Lista de pacientes</title>
</head>
<body>

    
<div id="contenedor" > <center><h1 class="text-4xl mb-10">LISTA DE PACIENTES</h1></center>
    <div id="izquierda" class="container mx-auto mt-10 sm:bg-green-300">
        <h1 class="text-4xl mb-10">Menu</h1> 
         
        <ul>
            <li>
            <button class="bg-blue-600 sm:bg-blue-300 hover:text-white md:text-black pr-3 pl-3 pb-2 pt-2 m-2 rounded">    
            <a href="<?php echo e(route('pacientes.index')); ?>">Pacientes</a>    
            </button>
            </li>
               
            <li>
            <button class="bg-blue-600 sm:bg-blue-300 hover:text-white md:text-black pr-3 pl-3 pb-2 pt-2 m-2 rounded">    
            <a href="<?php echo e(route('consultas.index')); ?>">Consultas</a>
            </button>
            </li>   
            
            <li>
            <button class="bg-blue-600 sm:bg-blue-300 hover:text-white md:text-black pr-3 pl-3 pb-2 pt-2 m-2 rounded"> 
            <a href="<?php echo e(route('pacientes.create')); ?>">Registrar paciente</a>
            </button>
            </li> 
        </ul>
    </div>

    <div id="derecha" class="container mx-auto mt-150 sm:bg-green-200">


    <center>
    
    <table class="bg-blue-600 sm:bg-yellow-300 text-black md:text-black pr-3 pl-3 pb-2 pt-2 m-2 rounded">
        <thead>
            <tr class="bg-blue-600 sm:bg-green-100 text-black md:text-black pr-3 pl-3 pb-2 pt-2 m-2 rounded">
                <th>Id</th>
                <th>Nombre</th>
                <th>CI</th>
                <th>Whatsapp</th>
                <th>Fecha de nacimiento</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
            <tr>
                <td><?php echo e($paciente->id); ?></td>
                <td><?php echo e($paciente->nombre); ?></td>
                <td><?php echo e($paciente->ci); ?></td>
                <td>
                    <a href="https://wa.me/591<?php echo e($paciente->whatsapp); ?>/?text=Bienvenido%20a%20consultorio%20dental%20Dientes%20de%20sable" target="_blank" rel="noopener noreferrer">
                        <?php echo e($paciente->whatsapp); ?>

                    </a>
                </td>
                <td><?php echo e($paciente->fecha_nac); ?></td>
                <td><?php echo e($paciente->created_at); ?></td>
                <td>
                <button class="bg-blue-600 sm:bg-blue-300 text-black md:text-black pr-3 pl-3 pb-2 pt-2 m-2 rounded"> 
                    <a href="<?php echo e(route('pacientes.show', $paciente->id)); ?>">Ver detalles</a>
                </button><br>
                <button class="bg-blue-600 sm:bg-blue-300 text-black md:text-black pr-3 pl-3 pb-2 pt-2 m-2 rounded">
                     <a href="<?php echo e(route('pacientes.edit', $paciente->id)); ?>">Editar</a>
                </button><br>
                    <form onsubmit="return confirmarBorrado()" class="form-borrar" action="<?php echo e(route('pacientes.destroy', $paciente->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                <button class="bg-blue-600 sm:bg-blue-300 text-black md:text-black pr-3 pl-3 pb-2 pt-2 m-2 rounded" type="submit">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table></div></center>
    
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
</div>
</body>
</html><?php /**PATH C:\laragon\www\Sisdental\resources\views/pacientes/index.blade.php ENDPATH**/ ?>