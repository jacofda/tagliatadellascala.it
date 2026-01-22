<?php $__env->startSection('meta'); ?>
<title>Video degli eventi: Scala dei Sapori e Forte Tagliata</title>

<meta name="description" content="Video degli eventi, concerti, spettacoli e feste: Scala dei Sapori e Associazione Tagliata della Scala" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo e(url('video')); ?>" />
<meta property="og:title" content="Video degli eventi: Scala dei Sapori e Forte Tagliata" />
<meta property="og:description" content="Video degli eventi, spettacoli, concerti e feste: Scala dei Sapori e Forte Tagliata" />
<meta property="og:image" content="<?php echo e(\App\Event::latest()->first()->image_full); ?>" />
<meta property="og:image:type" content="image/jpeg" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>

	<section class="small-section bg-dark-alfa-90">
	    <div class="relative container align-left">
	        
	        <div class="row">
	            
	            <div class="col-md-8">
	                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Video</h1>
	                <h2 class="hs-line-4 font-alt">Alcuni momenti dei nostri eventi significativi </h2>
	            </div>
	            
	            <div class="col-md-4 mt-30">
	                <div class="mod-breadcrumbs font-alt align-right">
	                    <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
	                    <span>Video</span>
	                </div>
	            </div>
	        </div>
	        
	    </div>
	</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-sm-8">
		<?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="blog-item">
                <h2 class="blog-item-title font-alt"><a href="<?php echo e($video->url); ?>"><?php echo e($video->name); ?></a></h2>
                <div class="blog-item-data">
                    <i class="fa fa-clock-o"></i> <?php echo e($video->created_at->format('d/m/Y')); ?>

                    <span class="separator">&nbsp;</span>
                    <i class="fa fa-user"></i> <?php echo e($video->sectors()->first()->name); ?>

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
                        <?php echo e($video->centocinquanta); ?>

                    </p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="col-sm-4">
    	<?php echo $__env->make('elements.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/videos/index.blade.php ENDPATH**/ ?>