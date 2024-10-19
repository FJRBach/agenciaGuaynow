
<div class="modal fade" id="modalSucursal<?php echo e($sucursal->IDSucursal); ?>" tabindex="-1" aria-labelledby="modalSucursalLabel<?php echo e($sucursal->IDSucursal); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSucursalLabel<?php echo e($sucursal->IDSucursal); ?>">MODIFICAR SUCURSAL: <?php echo e($sucursal->nombreSucursal); ?>, CON EL CÓDIGO: <?php echo e($sucursal->codigoSucursal); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo e(url('/catalogos/sucursales/'.$sucursal->IDSucursal.'/modificar')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                    <div class="row my-4">
                        <div class="form-group mb-3 col-md-6">
                            <label for="codigoSucursal<?php echo e($sucursal->IDSucursal); ?>">Código de Sucursal:</label>
                            <input type="text" class="form-control" name="codigoSucursal" id="codigoSucursal<?php echo e($sucursal->IDSucursal); ?>" value="<?php echo e($sucursal->codigoSucursal); ?>" required>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="nombreSucursal<?php echo e($sucursal->IDSucursal); ?>">Nombre de Sucursal:</label>
                            <input type="text" class="form-control" name="nombreSucursal" id="nombreSucursal<?php echo e($sucursal->IDSucursal); ?>" value="<?php echo e($sucursal->nombreSucursal); ?>" required>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="direccion<?php echo e($sucursal->IDSucursal); ?>">Dirección:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion<?php echo e($sucursal->IDSucursal); ?>" value="<?php echo e($sucursal->direccion); ?>" required>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="noExt<?php echo e($sucursal->IDSucursal); ?>">Número Exterior:</label>
                            <input type="text" class="form-control" name="noExt" id="noExt<?php echo e($sucursal->IDSucursal); ?>" value="<?php echo e($sucursal->noExt); ?>" required>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="ciudad<?php echo e($sucursal->IDSucursal); ?>">Ciudad:</label>
                            <input type="text" class="form-control" name="ciudad" id="ciudad<?php echo e($sucursal->IDSucursal); ?>" value="<?php echo e($sucursal->ciudad); ?>" required>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="provincia<?php echo e($sucursal->IDSucursal); ?>">Provincia:</label>
                            <input type="text" class="form-control" name="provincia" id="provincia<?php echo e($sucursal->IDSucursal); ?>" value="<?php echo e($sucursal->provincia); ?>" required>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="estado<?php echo e($sucursal->IDSucursal); ?>">Estado:</label>
                            <select class="form-control" name="estado" id="estado<?php echo e($sucursal->IDSucursal); ?>" required>
                                <option value="1" <?php echo e($sucursal->estado ? 'selected' : ''); ?>>ACTIVO</option>
                                <option value="0" <?php echo e(!$sucursal->estado ? 'selected' : ''); ?>>INACTIVO</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/extras/modificarSucursal.blade.php ENDPATH**/ ?>