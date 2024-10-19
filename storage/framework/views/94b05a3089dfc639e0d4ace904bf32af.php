


<?php $__env->startSection("content"); ?>
    <?php $__env->startComponent("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row my-4">
        <div class="col">
            <h1>Reportes</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <a href="<?php echo e(url('/reportes/sucursales-clientes')); ?>" class="btn-menu text-center" >Reporte Gráfico de Sucursales y Clientes</a>
            </div>

            <div class="col-md-4 mb-3">
                <a href="<?php echo e(url('/reportes/sucursales-generales')); ?>" class="btn-menu text-center">Reporte Sucursales Activas</a>
            </div>

            <div class="col-md-4 mb-3">
                <a href="<?php echo e(url('/reportes/reservaciones-por-periodo')); ?>" class="btn-menu text-center">Reporte de Reservaciones por Periodo</a>
            </div>

            <div class="col-md-4 mb-3">
                <a href="<?php echo e(url('/reportes/reservaciones-activas')); ?>" class="btn-menu text-center">Reporte de Reservaciones Activas</a>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("components.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/reportes/indexGet.blade.php ENDPATH**/ ?>