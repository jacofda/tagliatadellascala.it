<?php $__env->startSection('title'); ?> Crea Un Articolo <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo Form::open(['url' => url('articoli')]); ?>

        <?php echo $__env->make('pages.articles.form',  ['submitButtonText' => 'Crea Articolo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/articles/create.blade.php ENDPATH**/ ?>