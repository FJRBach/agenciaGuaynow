


<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]); ?>
    <?php echo $__env->renderComponent(); ?>

    <h1>RESERVACIONES DESDE <?php echo e($fecha_inicio); ?> HASTA <?php echo e($fecha_fin); ?></h1>
    <table class="table">
        <thead>
            <tr>
                <th>FOLIO RESERVACIÓN</th>
                <th>CLIENTE</th>
                <th>FECHA DE RESERVACIÓN</th>
                <th>ESTADO</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $reservaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center"><?php echo e($reservacion->IDReservacion); ?></td>
                    <td class="text-center"><?php echo e(optional($reservacion->cliente)->nombre); ?></td>
                    <td class="text-center"><?php echo e($reservacion->fechaReservacion); ?></td>
                    <td class="text-center"><?php echo e($reservacion->estado == 1 ? 'ACTIVO' : 'INACTIVO'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>


    <div class="d-flex justify-content-center">
        <a href="<?php echo e(route('reportes.reservaspdf.view', ['fecha_inicio' => $fecha_inicio, 'fecha_fin' => $fecha_fin])); ?>" class="btn btn-primary" style="margin-right: 10px;" target="_blank">VER PDF</a>
        <a href="<?php echo e(route('reportes.descargar-pdf', ['fecha_inicio' => $fecha_inicio, 'fecha_fin' => $fecha_fin])); ?>" class="btn btn-success ml-2" style="margin-left: 10px;">DESCARGAR PDF</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/reportes/resultadoReservaciones.blade.php ENDPATH**/ ?>