<?php $__env->startSection('title'); ?> Crea Un Evento <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['url' => url('eventi')]); ?>

        <?php echo $__env->make('pages.events.form',  ['submitButtonText' => 'Crea Evento'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/events/create.blade.php ENDPATH**/ ?>