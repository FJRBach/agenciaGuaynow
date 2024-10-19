

<?php $__env->startSection("content"); ?>
    <?php $__env->startComponent("components.breadcrumbs", ["breadcrumbs" => $breadcrumbs]); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="date">
        Generado el: <?php echo e(date('d/m/Y H:i:s')); ?>

    </div>
    <div class="header">
        <img src="<?php echo e(asset('logo.png')); ?>" alt="Logo" class="logo">
        <div class="info">
            <p class="agency-name">Agencia GüayNow</p>
            <p>Dirección de la Agencia</p>
            <p>Teléfono: +52 123 456 7890</p>
            <p>Email: contacto@guaynow.com</p>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <h1 class="text-center mb-4">Reporte Gráfico de Clientes por Sucursal</h1>
                <canvas id="sucursalesChart" width="100%" height="100"></canvas>    <!--tamaño de gráfica-->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctx = document.getElementById('sucursalesChart').getContext('2d');
                    const sucursalesChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($sucursales->pluck('nombreSucursal')->take(10)); ?>,
                            datasets: [{
                                label: 'NÚMERO DE CLIENTES ÚNICOS',
                                data: <?php echo json_encode($sucursales->pluck('reservaciones_count')->take(10)); ?>,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    stacked: true,
                                    ticks: {
                                        stepSize: 1,
                                        precision: 0
                                    }
                                },
                                x: {
                                    ticks: {
                                        autoSkip: false,
                                        maxRotation: 90,
                                        minRotation: 90
                                    }
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="footer">
        Derechos Reservados &copy; <?php echo e(date('Y')); ?> Agencia GüayNow
    </div>

    <style>
        .date {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 12px;
            color: #555;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 40px auto 10px;
        }
        .logo {
            width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .info {
            margin-top: 5px;
        }
        .info p {
            margin: 2px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #555;
        }
        .agency-name {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("components.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/reportes/sucursalesClientes.blade.php ENDPATH**/ ?>