


<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container">
    <div class="card mt-4 mb-4 p-3">
        <h1>Filtrar Reservaciones por Fecha</h1>
    </div>
</div>
<br>
    <form action="<?php echo e(route('reportes.reservaciones-por-periodo')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group row justify-content-center">
        <div class="col-md-4">
            <label for="fecha_inicio">Fecha Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" required class="form-control">
        </div>
    </div>
    <div class="form-group row justify-content-center">
        <div class="col-md-4">
            <label for="fecha_fin">Fecha Fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin" required class="form-control">
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <button type="submit" class="btn btn-primary">Generar Reporte</button>
        </div>
    </div>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/reportes/reservacionesPorPeriodo.blade.php ENDPATH**/ ?>