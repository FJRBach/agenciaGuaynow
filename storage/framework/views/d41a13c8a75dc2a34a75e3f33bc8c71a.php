<div class="container">
<div class="card mt-4 mb-4 p-3">
    <div class="row my-4">
        <div class="col">
            <h1>CLIENTES</h1>
        </div>
        <div class="col-auto">
            <form method="GET" action="<?php echo e(url('catalogos/clientes')); ?>" class="form-inline">
                <div class="form-group">
                    <label for="cliente_id" class="mr-2">FILTRAR POR CLIENTE:</label>
                    <select class="form-control" id="cliente_id" name="NIFCliente" onchange="this.form.submit()">
                        <option value="">MOSTRAR TODOS LOS CLIENTES</option>
                        <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cliente->NIFCliente); ?>" <?php echo e(request('NIFCliente') == $cliente->NIFCliente ? 'selected' : ''); ?>><?php echo e($cliente->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </form>
        </div>
        <div class="col-auto titlebar-commands">
            <a class="btn btn-primary" href="<?php echo e(url('/catalogos/clientes/agregar')); ?>">AGREGAR</a>
        </div>
    </div>
</div>
</div><?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/extras/buscarCliente.blade.php ENDPATH**/ ?>