<?php $__env->startSection('title'); ?> Modifica <?php echo e($article->name); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row">

            <?php echo Form::model($article, ['method' => 'PATCH', 'url' => url('articoli/'.$article->id)]); ?>


                <?php echo $__env->make('pages.articles.form',  ['submitButtonText' => 'Modifica Articolo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo Form::close(); ?>


		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/articles/edit.blade.php ENDPATH**/ ?>