<!DOCTYPE html>
<html lang="en">
<head>
    <!-- importar las librerías de bootstrap -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('bootstrap-5.3.2-dist/css/bootstrap.min.css')); ?>" />
    <script src="<?php echo e(URL::asset('bootstrap-5.3.2-dist/js/bootstrap.min.js')); ?>"></script>

   
    <!-- importar las librerías de DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">


    <link href="<?php echo e(URL::asset('assets/style.css')); ?>" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia GuayNow</title>
</head>
<body>
    <div class="row">
        <div class="col-2">
            <?php $__env->startComponent("components.sidebar"); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-10">
            <div class="container">
                <?php $__env->startSection("content"); ?>
                <?php echo $__env->yieldSection(); ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/components/layout.blade.php ENDPATH**/ ?>