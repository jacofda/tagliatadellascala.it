<?php $__env->startSection('title'); ?> Modifica <?php echo e($event->name); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row">

            <?php echo Form::model($event, ['method' => 'PATCH', 'url' => url('eventi/'.$event->id), 'class' => '']); ?>


                <?php echo $__env->make('pages.events.form',  ['submitButtonText' => 'Modifica Evento'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo Form::close(); ?>


		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/events/edit.blade.php ENDPATH**/ ?>