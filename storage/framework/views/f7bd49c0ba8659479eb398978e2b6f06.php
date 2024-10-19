<div class="modal fade" id="modalModificarReservacion<?php echo e($reservacion->IDReservacion); ?>" tabindex="-1" aria-labelledby="modalModificarReservacionLabel<?php echo e($reservacion->IDReservacion); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarReservacionLabel<?php echo e($reservacion->IDReservacion); ?>">MODIFICAR RESERVACIÓN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('reservaciones.update', ['IDReservacion' => $reservacion->IDReservacion])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="text-center">DATOS DEL CLIENTE: <?php echo e($reservacion->cliente->NIFCliente); ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-4"><strong>CLIENTE:</strong> <?php echo e($reservacion->cliente->nombre); ?></div>
                                <div class="col-md-4"><strong>EMAIL:</strong> <?php echo e($reservacion->cliente->email); ?></div>
                                <div class="col-md-4"><strong>TELÉFONO:</strong> <?php echo e($reservacion->cliente->telefono); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="sucursal">SUCURSAL:</label>
                        <select class="form-control" id="sucursal" name="IDSucursal" required>
                            <?php $__currentLoopData = $sucursales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sucursal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sucursal->IDSucursal); ?>" <?php echo e($sucursal->IDSucursal == $reservacion->IDSucursal ? 'selected' : ''); ?>>
                                    <?php echo e($sucursal->nombreSucursal); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fechaReservacion">FECHA DE RESERVACIÓN:</label>
                        <input type="datetime-local" class="form-control" id="fechaReservacion" name="fechaReservacion" value="<?php echo e(\Carbon\Carbon::parse($reservacion->fechaReservacion)->format('Y-m-d\TH:i')); ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="estado">ESTADO:</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1" <?php echo e($reservacion->estado == 1 ? 'selected' : ''); ?>>ACTIVO</option>
                            <option value="0" <?php echo e($reservacion->estado == 0 ? 'selected' : ''); ?>>INACTIVO</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-edit">
                            <img src="<?php echo e(asset('update.png')); ?>" alt="MOD" style="width: 48px; height: 48px;">
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/movimientos/reservacionesModificarGet.blade.php ENDPATH**/ ?>