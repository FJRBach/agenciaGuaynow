
  
<?php $__env->startSection("content"); ?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Agencia GuayNow')); ?></title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
   
</head>
<body>
<div class="mx-auto" style="width: 18rem;">
  <div class="card-img-top ">
    <img src="Logo.png" class="img-fluid" alt="...">
  </div>
  <div class="card-body text-center"> 
    <h1 class="card-text">GuayNow</h1>
  </div>
</div>
<br>
    
    <div class="card text-center">
      <div class="card-header">
        <h4 class="card-title">¿Quiénes somos?</h5>
      </div>
      <div class="card-body">
        
        <p class="card-text" style="text-align: justify; font-size: 18px;">Agencia Güaynow es más que una agencia de viajes; somos tu puente hacía nuevas experiencias y recuerdos duraderos. 
        Contando con sucursales en diversas ciudades, ofreciendo servicios personalizados de vuelos y estancias en hoteles, asegurando que cada aspecto de tu viaje sea perfecto. <br>
        Desde la selección del vuelo, hasta la estancia en un hotel.<br><strong>Cada cliente es único, y nos esforzamos por conocer sus preferencias para poder ofrecer la mejor experiencia de viaje posible.</strong></p>
      </div>
      <br>
    </div>
<?php echo $__env->make('extras.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("components.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/dashboard.blade.php ENDPATH**/ ?>