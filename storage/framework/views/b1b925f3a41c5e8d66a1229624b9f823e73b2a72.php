<?php $__env->startSection('title'); ?>
    Dettagli biglietto
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="text-center">

	<div class="col-xs-12 small">
		NOME COGNOME
	</div>
	<div class="col-xs-12 border-bottom">
		<?php echo e($profile->nome); ?>  <?php echo e($profile->cognome); ?>

	</div>


	<div class="col-xs-12 small">
		BIGLIETTI
	</div>
	<div class="col-xs-12 border-bottom">
		<?php $__currentLoopData = json_decode($ticket->ticket_json); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php echo e($type); ?>: <?php echo e($quantity); ?><br>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

	<div class="col-xs-12 small">
		CODICE
	</div>
	<div class="col-xs-12 border-bottom">
		<?php echo e($ticket->code); ?>

	</div>

	<div class="col-xs-12 small">
		DATA ACQUISTO
	</div>
	<div class="col-xs-12 border-bottom">
		<?php echo e($ticket->created_at->format('d/m/Y')); ?>

	</div>

	<div class="col-xs-12 small">
		PROVA d' ACQUISTO
	</div>
	<div class="col-xs-12 border-bottom">
		<?php echo e($ticket->charge_response_id); ?>

	</div>


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/admin/tickets/showTicketAdmin.blade.php ENDPATH**/ ?>