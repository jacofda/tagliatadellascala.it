<?php $__env->startSection('title'); ?>
    Gallerie
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="clearfix"></div>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Titolo</th>
					<th>Settore</th>
					<th>Azioni</th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($gallery->name); ?></td>
						<td><?php echo e($gallery->sectors()->first()->name); ?></td>
						<td>
	                        <?php echo Form::open([ 'method'  => 'delete', 'url' => url('gallerie/'.$gallery->slug) ]); ?>

	                            <button class="btn btn-danger btn-xs" type="submit">Elimina</button>
	                            <a class="btn btn-primary btn-xs" href="<?php echo e(url('gallerie/'.$gallery->id.'/edit')); ?>">Modifica</a>
	                            <a class="btn btn-warning btn-xs" href="<?php echo e(url('admin/gallerie/'.$gallery->id.'/media')); ?>">Immagini</a>
	                            <a class="btn btn-success btn-xs" href="<?php echo e($gallery->url); ?>">Vedi</a>
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
            <?php echo e($galleries->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/admin/galleries.blade.php ENDPATH**/ ?>