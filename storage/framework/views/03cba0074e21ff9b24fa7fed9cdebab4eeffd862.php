<?php $__env->startSection('title'); ?>
    Eventi
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="clearfix"></div>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Titolo</th>
					<th>Settore</th>
					<th>Data Inizio</th>
					<th>Azioni</th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($event->name); ?></td>
						<td><?php echo e($event->sectors()->first()->name); ?></td>
						<td><?php echo e($event->start); ?></td>
						<td>
	                        <?php echo Form::open([ 'method'  => 'delete', 'url' => url('eventi/'.$event->slug) ]); ?>

	                            <button class="btn btn-danger btn-xs" type="submit">Elimina</button>
	                            <a class="btn btn-primary btn-xs" href="<?php echo e(url('eventi/'.$event->id.'/edit')); ?>">Modifica</a>
	                            <a class="btn btn-warning btn-xs" href="<?php echo e(url('admin/eventi/'.$event->id.'/media')); ?>">Immagini</a>
	                            <a class="btn btn-success btn-xs" href="<?php echo e($event->url); ?>">Vedi</a>
	                        <?php echo Form::close(); ?>

						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
	<div class="clearfix"></div>

    <div class="row">
        <div class="text-center">
            <?php echo e($events->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/admin/events.blade.php ENDPATH**/ ?>