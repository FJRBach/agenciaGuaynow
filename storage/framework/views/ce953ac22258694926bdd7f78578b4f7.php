<nav aria-label = "breadcrumb">
    <ol class = "breadcrumb">
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name =>$url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($loop->last): ?>
                <li class = "breadcrum-item active" aria-current="page" style="margin-right: 10px;">
                    <?php echo e($name); ?>

                </li>
            <?php else: ?>
                <li class = "breadcrum-item" style="margin-right: 10px;">
                    <a href="<?php echo e($url); ?>"><?php echo e($name); ?></a> /
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
</nav>

<?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/components/breadcrumbs.blade.php ENDPATH**/ ?>