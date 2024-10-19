
<?php $__env->startSection('content'); ?>
<?php $__env->startComponent("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]); ?>
    <?php echo $__env->renderComponent(); ?>
    <h1>Reservaciones Activas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>CLIENTE</th>
                <th>SUCURSAL</th>
                <th>FECHA</th>
                <th>ESTADO</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $reservaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center"><?php echo e($reservacion->IDReservacion); ?></td>
                    <td class="text-center"><?php echo e(optional($reservacion->cliente)->nombre); ?></td>
                    <td class="text-center"><?php echo e($reservacion->sucursal->nombreSucursal); ?></td>
                    <td class="text-center"><?php echo e($reservacion->fechaReservacion); ?></td>
                    <td class="text-center"><?php echo e($reservacion->estado == 1 ? 'ACTIVO' : 'INACTIVO'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <a href="<?php echo e(route('grafica-reservaciones-sucursal')); ?>" class="btn btn-primary">VER GRÁFICA</a>
    <a href="<?php echo e(route('download-reservaciones-activas-pdf')); ?>" class="btn btn-success">DESCARGAR PDF</a>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/reportes/reservacionesActivas.blade.php ENDPATH**/ ?>