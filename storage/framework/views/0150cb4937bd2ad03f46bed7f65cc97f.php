
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]); ?>
    <?php echo $__env->renderComponent(); ?>
    <h1>LISTA DE SUCURSALES GENERALES</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DIRECCIÓN</th>
                <th>CIUDAD</th>
                <th>PROVINCIA</th>
                <th>ESTADO</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $sucursales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sucursal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center"><?php echo e($sucursal->IDSucursal); ?></td>
                    <td class="text-center"><?php echo e($sucursal->nombreSucursal); ?></td>
                    <td class="text-center"><?php echo e($sucursal->direccion); ?></td>
                    <td class="text-center"><?php echo e($sucursal->ciudad); ?></td>
                    <td class="text-center"><?php echo e($sucursal->provincia); ?></td>
                    <td class="text-center"><?php echo e($sucursal->estado == 1 ? 'ACTIVO' : 'INACTIVO'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <a href="<?php echo e(url('/reportes/sucursales-generales-pdf/view')); ?>" class="btn btn-primary" style="margin-right: 10px;" target="_blank">VER PDF</a>
        <a href="<?php echo e(url('/reportes/sucursales-generales-pdf/download')); ?>" class="btn btn-success ml-2" style="margin-left: 10px;">DESCARGAR PDF</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/reportes/sucursalesGenerales.blade.php ENDPATH**/ ?>