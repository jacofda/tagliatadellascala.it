<?php $__env->startSection('meta'); ?>
<title><?php echo e($video->name); ?> | <?php echo e($sector->name); ?></title>
<meta name="description" content="<?php echo e($video->centocinquanta); ?>" />
<link rel="canonical" href="<?php echo e($video->url); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>

	<section class="small-section bg-dark-alfa-90">
	    <div class="relative container align-left">

	        <div class="row">

	            <div class="col-md-8">
	                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0"><?php echo e($video->name); ?></h1>
	                <h2 class="hs-line-4 font-alt">Video <?php echo e($sector->name); ?> </h2>
	            </div>

	            <div class="col-md-4 mt-30">
	                <div class="mod-breadcrumbs font-alt align-right">
	                    <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url('video')); ?>">Video</a>&nbsp;/&nbsp;
	                    <span><?php echo e($video->name); ?></span>
	                </div>
	            </div>
	        </div>

	    </div>
	</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="col-sm-8">

		<div class="blog-item">
            <h3 class="blog-item-title font-alt"><?php echo e($video->name); ?></h3>
            <div class="blog-item-data">
                <i class="fa fa-clock-o"></i> <?php echo e($video->created_at->format('d/m/Y')); ?>

                <span class="separator">&nbsp;</span>
                <i class="fa fa-user"></i> <?php echo e($sector->name); ?>

                <span class="separator">&nbsp;</span>
                <i class="fa fa-folder-open"></i>
                <?php $__currentLoopData = $video->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->last): ?>
                    	<a href="<?php echo e(url('tags/'.$tag->slug)); ?>"><?php echo e($tag->name); ?></a>
					<?php else: ?>
						<a href="<?php echo e(url('tags/'.$tag->slug)); ?>"><?php echo e($tag->name); ?></a>,
					<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="blog-media">
                <iframe width="640" height="360" src="<?php echo e($video->embed); ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="blog-item-body">
                <p>
                    <?php echo $video->centocinquanta; ?>

                </p>
            </div>
        </div>

    </div>

    <div class="col-sm-4">
    	<?php echo $__env->make('elements.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/videos/show.blade.php ENDPATH**/ ?>