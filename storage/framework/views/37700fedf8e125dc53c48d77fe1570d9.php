
<?php if($paginator->hasPages()): ?>
        <nav>
            <ul class="pagination">
                
                <?php if($paginator->onFirstPage()): ?>
                    <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.Anterior'); ?>">
                        <span class="page-link" aria-hidden="true">Anterior &lsaquo;</span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.Anterior'); ?>">&lsaquo;</a>
                    </li>
                <?php endif; ?>

                
                <?php if($paginator->hasMorePages()): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.Siguiente'); ?>">Siguiente &rsaquo;</a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.Siguiente'); ?>">
                        <span class="page-link" aria-hidden="true">Siguiente &rsaquo;</span>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php endif; ?><?php /**PATH C:\xampp\htdocs\agenciaViajes\resources\views/vendor/pagination/custom.blade.php ENDPATH**/ ?>