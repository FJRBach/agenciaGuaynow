<div class="modal fade" id="modalModificarVuelo<?php echo e($reservacion->IDReservacion); ?>" tabindex="-1" aria-labelledby="modalModificarVueloLabel<?php echo e($reservacion->IDReservacion); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalModificarVueloLabel<?php echo e($reservacion->IDReservacion); ?>">MODIFICAR VUELO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="font-size: 21px;">
                <form action="<?php echo e(url('movimientos/reservaciones/' . $reservacion->IDReservacion . '/modificar_vuelo')); ?>" method="POST">
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
                    <div class="form-group mb-3 text-center">
                        <label for="IDVuelo">VUELO:</label>
                        <div class=" d-flex justify-content-center">
                            <select class="form-control" id="IDVuelo" name="IDVuelo" style="width: 448px; font-size: 20.5px;" required>
                                <?php $__currentLoopData = $vuelos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vuelo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($vuelo->IDVuelo); ?>" data-salida="<?php echo e($vuelo->fechaHraSalida); ?>" data-llegada="<?php echo e($vuelo->fechaHraLlegada); ?>" <?php echo e($vuelo->IDVuelo == $reservacion->IDVuelo ? 'selected' : ''); ?>>VUELO <?php echo e($vuelo->IDVuelo); ?>: <?php echo e($vuelo->origen); ?> - <?php echo e($vuelo->destino); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3 text-center" style="font-size: 21.5px;">
                        <label for="fechaHraSalida">FECHA Y HORA DE SALIDA:</label>
                            <div class="text-center d-flex justify-content-center">
                                <input type="datetime-local" class="form-control" style="width: 228px; font-size: 21.5px;" id="fechaHraSalida" name="fechaHraSalida" value="<?php echo e(\Carbon\Carbon::parse($reservacion->detailReservVueloHotel->fechahoraSalida ?? now())->format('Y-m-d\TH:i')); ?>" readonly>
                            </div>
                    </div>
                    <div class="form-group mb-3 text-center" style="font-size: 21.5px;">
                        <label for="fechaHraLlegada">FECHA Y HORA DE LLEGADA:</label>
                        <div class=" d-flex justify-content-center">
                            <input type="datetime-local" class="form-control" style="width: 228px; font-size: 21.5px;" id="fechaHraLlegada" name="fechaHraLlegada" value="<?php echo e(\Carbon\Carbon::parse($reservacion->detailReservVueloHotel->fechahoraLlegada ?? now())->format('Y-m-d\TH:i')); ?>" readonly>
                        </div>
                    </div>    
                    <div class="form-group mb-3 text-center">
                        <label for="estado">ESTADO:</label>
                        <div class=" d-flex justify-content-center">
                            <select class="form-control text-center" id="estado" name="estado" style="width: 148px; font-size: 21.5px;" required>
                                <option value="1" <?php echo e($reservacion->estado == 1 ? 'selected' : ''); ?>>ACTIVO</option>
                                <option value="0" <?php echo e($reservacion->estado == 0 ? 'selected' : ''); ?>>INACTIVO</option>
                            </select>
                        </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const vueloSelect = document.querySelector('#modalModificarVuelo<?php echo e($reservacion->IDReservacion); ?> #IDVuelo');
        const fechaSalidaInput = document.querySelector('#modalModificarVuelo<?php echo e($reservacion->IDReservacion); ?> #fechaHraSalida');
        const fechaLlegadaInput = document.querySelector('#modalModificarVuelo<?php echo e($reservacion->IDReservacion); ?> #fechaHraLlegada');

        vueloSelect.addEventListener('change', function () {
            const selectedOption = vueloSelect.options[vueloSelect.selectedIndex];
            const fechaSalida = selectedOption.getAttribute('data-salida');
            const fechaLlegada = selectedOption.getAttribute('data-llegada');
            
            fechaSalidaInput.value = new Date(fechaSalida).toISOString().slice(0, 16);
            fechaLlegadaInput.value = new Date(fechaLlegada).toISOString().slice(0, 16);
        });
    });
</script>
<?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/movimientos/reservacionVueloModificarGet.blade.php ENDPATH**/ ?>