<?php $__env->startSection('title'); ?>
    Articoli
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="clearfix"></div>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Titolo</th>
					<th>Settore</th>
                    <th>Data</th>
					<th>Azioni</th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($article->name); ?></td>
						<td><?php echo e($article->sectors()->first()->name); ?></td>
                        <td><?php echo e($article->created_at->format('m/Y')); ?></td>
						<td>
	                        <?php echo Form::open([ 'method'  => 'delete', 'url' => url('articoli/'.$article->slug) ]); ?>

	                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
	                            <a class="btn btn-primary btn-xs" href="<?php echo e(url('articoli/'.$article->id.'/edit')); ?>"><i class="fa fa-edit"></i></a>
	                            <a class="btn btn-warning btn-xs" href="<?php echo e(url('admin/articoli/'.$article->id.'/media')); ?>"><i class="fa fa-image"></i></a>
	                            <a class="btn btn-success btn-xs" href="<?php echo e($article->url); ?>"><i class="fa fa-eye"></i></a>
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
            <?php echo e($articles->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/admin/articles.blade.php ENDPATH**/ ?>