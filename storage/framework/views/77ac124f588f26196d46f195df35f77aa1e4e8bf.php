<?php $__env->startSection('title'); ?> Crea Una nuova Tag <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['url' => url('tags')]); ?>

        <?php echo $__env->make('pages.tags.form',  ['submitButtonText' => 'Crea Tag'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/tags/create.blade.php ENDPATH**/ ?>