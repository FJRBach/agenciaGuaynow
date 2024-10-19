

<?php $__env->startSection("content"); ?>
    <?php $__env->startComponent("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]); ?>
    <?php echo $__env->renderComponent(); ?>
<div class="container">
<div class="card mt-4 mb-4 p-3">
    <div class="row">
        <div class="form-group my-3">
            <h1>AGREGAR CLIENTE</h1>
        </div>
    </div>
</div>
</div>
    <form method="post" action="<?php echo e(url('/catalogos/clientes/agregar')); ?>">
        <?php echo csrf_field(); ?>

        <div class="row my-4">
            <div class="form-group mb-3 col-6">
                <label for="nombre">NOMBRE:</label>
                <input type="text" maxlength="32" class="form-control" name="nombre" placeholder="Ingrese nombre completo" id="nombre" required autofocus>
            </div>

            <div class="form-group mb-3 col-6">
                <label for="ciudad">CIUDAD:</label>
                <input type="text" maxlength="30" class="form-control" name="ciudad" placeholder="Ingrese la ciudad" id="ciudad" required>
            </div>
        </div>

        <div class="row my-4">
            <div class="form-group mb-3 col-6">
                <label for="telefono">TELÉFONO:</label>
                <input type="text" maxlength="32" class="form-control" name="telefono" placeholder="Ingrese el teléfono" id="telefono" required>
            </div>

            <div class="form-group mb-3 col-6">
                <label for="email">EMAIL:</label>
                <input type="email" maxlength="50" class="form-control" name="email" placeholder="Ingrese el email" id="email" required>
            </div>
        </div>

        <div class="row my-4">
            <div class="form-group mb-3 col-6">
                <label for="estado">ESTADO:</label>
                <select name="estado" id="estado" class="form-control" required>
                    <option value="1">ACTIVO</option>
                    <option value="0">INACTIVO</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">GUARDAR</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("components.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/catalogos/ClientesAgregarGet.blade.php ENDPATH**/ ?>