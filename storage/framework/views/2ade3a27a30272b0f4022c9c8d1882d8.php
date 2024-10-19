<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sucursales Generales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            position: relative;
        }
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
        .header img {
            height: 100px; /* Aumentar el tamaño del logo */
            display: block;
            margin: 0 auto;
        }
        .info {
            margin-top: 5px;
        }
        .info p {
            margin: 2px 0;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            background-color: white;
            color: black;
        }
        th {
            background-color: #e0f7fa;
            color: #00796b;
            font-size: 14px;
        }
        td {
            font-size: 12px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="<?php echo e($logoBase64); ?>" alt="Logo GuayNow">
        <div class="info">
            <p class="agency-name">Agencia GüayNow</p>
            <p>Dirección de la Agencia</p>
            <p>Teléfono: +52 123 456 7890</p>
            <p>Email: contacto@guaynow.com</p>
        </div>
    </div>
    <h1 class="title">SUCURSALES GENERALES</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DIRECCIÓN</th>
                <th>CIUDAD</th>
                <th>PROVINCIA</th>
                <th>ESTADO</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $sucursales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sucursal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($sucursal->IDSucursal); ?></td>
                    <td><?php echo e($sucursal->nombreSucursal); ?></td>
                    <td><?php echo e($sucursal->direccion); ?></td>
                    <td><?php echo e($sucursal->ciudad); ?></td>
                    <td><?php echo e($sucursal->provincia); ?></td>
                    <td><?php echo e($sucursal->estado == 1 ? 'ACTIVO' : 'INACTIVO'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="footer">
        Derechos Reservados &copy; <?php echo e(date('Y')); ?> Agencia GüayNow
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/reportes/sucursalesGeneralesPDF.blade.php ENDPATH**/ ?>