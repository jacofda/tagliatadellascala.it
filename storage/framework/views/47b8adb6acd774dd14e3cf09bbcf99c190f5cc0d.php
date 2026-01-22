<?php if( session('message') ): ?> 
    <div class="row alert">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 60px;">
            <div class="alert success">
                <i class="fa fa-lg fa-check-circle-o"></i> <?php echo e(session('message')); ?>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
<?php endif; ?>
<?php if( session('error') ): ?> 
    <div class="row alert">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 60px;">
            <div class="alert error">
                <i class="fa fa-lg fa-times-circle"></i>
                    <?php if( is_array( session('error') ) ): ?>
                      <?php echo e(session('error')['message']); ?>

                    <?php else: ?>
                      <?php echo e(session('error')); ?>

                    <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
<?php endif; ?>


<?php if( session()->has('message') || session()->has('error') ): ?>
    <?php $__env->startSection('scripts'); ?>
        <script>
            setTimeout(function(){
                $('.alert').hide('slow');
            }, 5000)
        </script>
    <?php $__env->stopSection(); ?>
<?php endif; ?><?php /**PATH /var/www/html/resources/views/elements/session.blade.php ENDPATH**/ ?>