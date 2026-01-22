<?php $__env->startSection('title'); ?>
    Biglietti
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="col-sm-8">
		<p><u>filtra x evento</u></p>
		<a class="btn btn-default" href="<?php echo e(url('tickets')); ?>">TUTTI</a>
		<?php $__currentLoopData = \App\Event::whereNotNull('price')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<a class="btn btn-default" href="<?php echo e(url('tickets?filter='.$event->id)); ?>"><?php echo e($event->name); ?></a>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<div class="col-sm-4">
		<p><u>ordina per data di acquisto</u></p>
		<a class="btn btn-default" href="<?php echo e(url('tickets?sort=DESC')); ?>">ultimi</a>
		<a class="btn btn-default" href="<?php echo e(url('tickets?sort=ASC')); ?>">primi</a>
	</div>
	<div class="clearfix"></div>
	<div class="table-responsive" style="margin-top:50px;">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Evento</th>
					<th>Data</th>
					<th>Nome</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($ticket->id); ?></td>
						<td><?php echo e($ticket->event->name); ?></td>
						<td><?php echo e($ticket->created_at->format('d/m/Y')); ?></td>
						<td><?php echo e($ticket->user->profile->nome); ?>  <?php echo e($ticket->user->profile->cognome); ?></td>
						<td>
	                        <?php echo Form::open([ 'method'  => 'delete', 'url' => url('articoli/'.$ticket->slug) ]); ?>

	                            <button class="btn btn-danger btn-xs" type="submit">Elimina</button>
	                            <a class="btn btn-success btn-xs" href="<?php echo e(url('ticket/'.$ticket->id)); ?>">Vedi</a>
	                        <?php echo Form::close(); ?>

						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
	<div class="clearfix"></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/admin/tickets/index.blade.php ENDPATH**/ ?>