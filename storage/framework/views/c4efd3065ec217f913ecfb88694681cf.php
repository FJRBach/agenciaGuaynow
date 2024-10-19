

<?php $__env->startSection("content"); ?>
    <?php $__env->startComponent("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]); ?>
    <?php echo $__env->renderComponent(); ?>
    
    <div class="container">
        <div class="card mt-4 mb-4 p-3">
            <div class="d-flex justify-content-between align-items-center my-4">
                <div>
                    <h1>RESERVACIONES</h1>
                </div>
                <div><br>
                    <a class="btn btn-edit" href="<?php echo e(url('movimientos/reservaciones/agregar')); ?>">
                    <img src="<?php echo e(asset('add4.png')); ?>" alt="MOD" >
                    </a>
                </div>
            </div>
        </div>

        <!-- Tabla de reservaciones -->
        <div class="table-responsive">
            <table class="table txt-expand" id="maintable">
                <thead>
                    <tr>
                        <th scope="col" class="col-1 text-center">CLIENTE</th>
                        <th scope="col" class="col-2 text-center">SUCURSAL</th>
                        <th scope="col" class="col-1 text-center">ORIGEN DE VUELO</th>
                        <th scope="col" class="col-2 text-center">DESTINO DE VUELO</th>
                        <th scope="col" class="col-1 text-center">BOLETOS</th>
                        <th scope="col" class="col-2 text-center">HOTEL</th>
                        <th scope="col" class="col-1 text-center">TIPO HABITACIÓN</th>
                        <th scope="col" class="col-1 text-center">NÚMERO PERSONAS</th>
                        <th scope="col" class="col-2 text-center">REGISTRO PARA RESERVACIÓN</th>
                        <th scope="col" class="col-2 text-center">MODIFICAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $reservaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center col-1"><?php echo e($reservacion->cliente->nombre ?? 'NO DEFINIDO'); ?></td>
                            <td class="text-center col-2"><?php echo e($reservacion->sucursal->nombreSucursal ?? 'NO DEFINIDO'); ?></td>
                            <td class="text-center col-1"><?php echo e($reservacion->detailReservVueloHotel->vuelo->origen ?? 'NO RESERVÓ'); ?></td>
                            <td class="text-center col-2"><?php echo e($reservacion->detailReservVueloHotel->vuelo->destino ?? 'NO RESERVÓ'); ?></td>
                            <td class="text-center col-1">
                                <?php if($reservacion->detailReservVueloHotel && $reservacion->detailReservVueloHotel->boletos): ?>
                                    <a class="btn btn-outline-primary btn-md" href="#" data-bs-toggle="modal" data-bs-target="#boletosModal<?php echo e($reservacion->IDReservacion); ?>" style="width: 52px;">
                                        <?php echo e(count(json_decode($reservacion->detailReservVueloHotel->boletos))); ?> 
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="boletosModal<?php echo e($reservacion->IDReservacion); ?>" tabindex="-1" aria-labelledby="boletosModalLabel<?php echo e($reservacion->IDReservacion); ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="boletosModalLabel<?php echo e($reservacion->IDReservacion); ?>">Detalles de Boletos</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php $__currentLoopData = json_decode($reservacion->detailReservVueloHotel->boletos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boleto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <p>Boleto de <?php echo e($boleto->cantidad); ?>x <?php echo e($clasesVuelo[$boleto->clase]->descripcionClase ?? 'Clase no definida'); ?></p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    0
                                <?php endif; ?>
                            </td>
                            <td class="text-center col-2"><?php echo e($reservacion->detailReservVueloHotel->hotel->nombre ?? 'NO RESERVÓ'); ?></td>
                            <td class="text-center col-1">
                                <?php
                                    $tipoHabitacion = $reservacion->detailReservVueloHotel->tipoHabitacion ?? 'NO RESERVÓ';
                                    $tipoHabitacionMap = [
                                        'single' => 'INDIVIDUAL',
                                        'double' => 'DOBLE',
                                        'family' => 'FAMILIAR'
                                    ];
                                ?>
                                <?php echo e($tipoHabitacionMap[$tipoHabitacion] ?? $tipoHabitacion); ?>

                            </td>
                            <td class="text-center col-1"><?php echo e($reservacion->detailReservVueloHotel->numeroPersonas ?? '0'); ?></td>
                            <td class="text-center col-2"><?php echo e(\Carbon\Carbon::parse($reservacion->fechaReservacion)->format('d-m-Y H:i')); ?></td>
                            <td class="text-center col-2">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalModificarReservacion<?php echo e($reservacion->IDReservacion); ?>"><strong>RESERVA</strong></button>
                                    <?php if($reservacion->detailReservVueloHotel && $reservacion->detailReservVueloHotel->IDVuelo): ?>
                                        <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalModificarVuelo<?php echo e($reservacion->IDReservacion); ?>"><strong>VUELO</strong></button>
                                    <?php endif; ?>
                                    <?php if($reservacion->detailReservVueloHotel && $reservacion->detailReservVueloHotel->IDHotel): ?>
                                        <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalModificarHotel<?php echo e($reservacion->IDReservacion); ?>"><strong>HOTEL</strong></button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php echo $__env->make('movimientos.reservacionesModificarGet', ['reservacion' => $reservacion, 'clientes' => $clientes, 'sucursales' => $sucursales], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('movimientos.reservacionVueloModificarGet', ['reservacion' => $reservacion, 'vuelos' => $vuelos, 'clasesVuelo' => $clasesVuelo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('movimientos.reservacionesHotelModificarGet', ['reservacion' => $reservacion, 'hoteles' => $hoteles, 'regimenesHospedaje' => $regimenesHospedaje], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts para DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <style>
        .table thead th:nth-child(odd),
        .table tbody td:nth-child(odd) {
            background-color: #e9ecef;
        }
        .table thead th:nth-child(even),
        .table tbody td:nth-child(even) {
            background-color: #f8f9fa;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#maintable').DataTable({
                "paging": true,
                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
                "pageLength": 5,
                "language": {
                    "decimal": ",",
                    "thousands": ".",
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("components.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/movimientos/reservacionesGet.blade.php ENDPATH**/ ?>