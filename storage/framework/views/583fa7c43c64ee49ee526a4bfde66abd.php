

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs]); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="container">
        <div class="card mt-4 mb-4 p-3">
            <div class="row">
                <div class="form-group my-3">
                    <h1>MODIFICAR DATOS DEL CIENTE: <?php echo e($cliente->NIFCliente); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="<?php echo e(url('/catalogos/clientes/' . $cliente->NIFCliente . '/modificar')); ?>">
        <?php echo csrf_field(); ?> <!-- Token CSRF para proteger contra ataques de solicitud de sitios cruzados -->

        <div class="form-group">
            <label for="nombre">NOMBRE:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo e($cliente->nombre); ?>" autofocus>
        </div>

        <div class="row my-2">
            <div class="form-group mb-3 col-6">
                <label for="ciudad">CIUDAD:</label>
                <input type="text" name="ciudad" id="ciudad" class="form-control" value="<?php echo e($cliente->ciudad); ?>">
            </div>

            <div class="form-group mb-3 col-6">
                <label for="telefono">TELÉFONO:</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo e($cliente->telefono); ?>">
            </div>
        </div>

        <div class="row my-2">
            <div class="form-group mb-3 col-6">
                <label for="email">EMAIL:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo e($cliente->email); ?>">
            </div>

            <div class="form-group mb-3 col-6">
                <label for="estado">ESTADO:</label>
                <select class="form-select" name="estado" id="estado" required>
                    <option value="1" <?php echo e($cliente->estado == 1 ? 'selected' : ''); ?>>ACTIVO</option>
                    <option value="0" <?php echo e($cliente->estado == 0 ? 'selected' : ''); ?>>INACTIVO</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/catalogos/clientesModificarGet.blade.php ENDPATH**/ ?>