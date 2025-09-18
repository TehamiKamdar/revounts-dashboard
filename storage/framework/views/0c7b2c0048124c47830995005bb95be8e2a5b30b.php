<?php if($paginator->hasPages()): ?>
    <div class="d-flex justify-content-between align-items-center mt-3">
        
        <div class="d-flex pageBtn">
            <button class="btn btn-sm btn-navigation me-2"
                    <?php if($paginator->onFirstPage()): ?> disabled <?php endif; ?>
                    onclick="window.location='<?php echo e($paginator->url(1)); ?>'">
                ⏮ <span class="md-none">First</span>
            </button>

            <button class="btn btn-sm btn-navigation"
                    <?php if($paginator->onFirstPage()): ?> disabled <?php endif; ?>
                    onclick="window.location='<?php echo e($paginator->previousPageUrl()); ?>'">
                ◀ <span class="md-none">Prev</span>
            </button>
        </div>

        
        <div id="pageInfo" class="text-primary-light">
            Page <?php echo e($paginator->currentPage()); ?> of <?php echo e($paginator->lastPage()); ?> —
            Showing <?php echo e($paginator->firstItem()); ?> to <?php echo e($paginator->lastItem()); ?> of <?php echo e($paginator->total()); ?> records
        </div>

        
        <div class="d-flex pageBtn">
            <button class="btn btn-sm btn-navigation me-2"
                    <?php if(!$paginator->hasMorePages()): ?> disabled <?php endif; ?>
                    onclick="window.location='<?php echo e($paginator->nextPageUrl()); ?>'">
                <span class="md-none">Next</span> ▶
            </button>

            <button class="btn btn-sm btn-navigation"
                    <?php if(!$paginator->hasMorePages()): ?> disabled <?php endif; ?>
                    onclick="window.location='<?php echo e($paginator->url($paginator->lastPage())); ?>'">
                <span class="md-none">Last</span> ⏭
            </button>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/vendor/pagination/custom.blade.php ENDPATH**/ ?>