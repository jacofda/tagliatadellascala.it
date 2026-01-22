<?php $__env->startSection('title'); ?>
    Profili
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="clearfix"></div>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Data Iscrizione</th>
					<th>Email</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($profile->full_name); ?></td>
						<td><?php echo e($profile->created_at->format('d/m/Y')); ?></td>
						<td><?php echo e($profile->user->email); ?></td>
						<td>
	                        <?php echo Form::open([ 'method'  => 'delete', 'url' => url('profilo/'.$profile->id) ]); ?>

	                            <button class="btn btn-danger btn-xs" type="submit">Elimina</button>
	                            <a class="btn btn-success btn-xs" href="<?php echo e(url('profilo/'.$profile->id)); ?>">Vedi</a>
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
            <?php echo e($profiles->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/admin/profiles.blade.php ENDPATH**/ ?>