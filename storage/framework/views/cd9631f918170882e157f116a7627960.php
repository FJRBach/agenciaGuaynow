<!-- Modal para Agregar Vuelo -->
<div class="modal fade" id="modalAgregarVuelo" tabindex="-1" aria-labelledby="modalAgregarVueloLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarVueloLabel">AGREGAR VUELO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo e(url('/catalogos/vuelos/agregar')); ?>" style="font-size: 18px;">
                    <?php echo csrf_field(); ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="fechaHraSalida" class="form-label">FECHA Y HORA DE SALIDA:</label>
                            <input type="datetime-local" class="form-control" name="fechaHraSalida" id="fechaHraSalida" required>
                        </div>
                        <div class="col-md-6">
                            <label for="fechaHraLlegada" class="form-label">FECHA Y HORA DE LLEGADA:</label>
                            <input type="datetime-local" class="form-control" name="fechaHraLlegada" id="fechaHraLlegada" required>
                        </div>
                        <div class="col-md-6">
                            <label for="origen" class="form-label">ORIGEN:</label>
                            <input type="text" class="form-control" name="origen" id="origen" required placeholder="COLIMA">
                        </div>
                        <div class="col-md-6">
                            <label for="destino" class="form-label">DESTINO:</label>
                            <input type="text" class="form-control" name="destino" id="destino" placeholder="OAKLAND" required>
                        </div>
                        <div class="col-md-6">
                            <label for="plazasPrimeraClase" class="form-label">PLAZAS PRIMERA CLASE:</label>
                            <input type="number" class="form-control" name="plazasPrimeraClase" id="plazasPrimeraClase" required min="0">
                        </div>
                        <div class="col-md-6">
                            <label for="plazasEjecutiva" class="form-label">PLAZAS EJECUTIVA:</label>
                            <input type="number" class="form-control" name="plazasEjecutiva" id="plazasEjecutiva" required min="0">
                        </div>
                        <div class="col-md-6">
                            <label for="plazasEconomica" class="form-label">PLAZAS ECONÓMICA:</label>
                            <input type="number" class="form-control" name="plazasEconomica" id="plazasEconomica" required min="0">
                        </div>
                        <div class="col-md-6">
                            <label for="estado" class="form-label">ESTADO:</label>
                            <select class="form-select" name="estado" id="estado" required>
                                <option value="1">ACTIVO</option>
                                <option value="0">INACTIVO</option>
                            </select>
                        </div>
                    </div>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger mt-3">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="mt-4">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary">GUARDAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/catalogos/vuelosAgregarGet.blade.php ENDPATH**/ ?>