<div class="modal fade" id="modalCliente<?php echo e($cliente->NIFCliente); ?>" tabindex="-1" aria-labelledby="modalClienteLabel<?php echo e($cliente->NIFCliente); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalClienteLabel<?php echo e($cliente->NIFCliente); ?>">MODIFICAR CLIENTE: <?php echo e($cliente->NIFCliente); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo e(url('/catalogos/clientes/'.$cliente->NIFCliente.'/modificar')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">NOMBRE:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($cliente->nombre); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">CIUDAD:</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo e($cliente->ciudad); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">EMAIL:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e($cliente->email); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">TELÉFONO:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo e($cliente->telefono); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                    <label for="estado">Estado:</label>
                        <select class="form-control" name="estado" id="estado" required>
                            <option value="1" <?php echo e($cliente->estado ? 'selected' : ''); ?>>ACTIVO</option>
                            <option value="0" <?php echo e(!$cliente->estado ? 'selected' : ''); ?>>INACTIVO</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
                        <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/extras/modificarCliente.blade.php ENDPATH**/ ?>