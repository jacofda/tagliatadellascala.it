<?php $__env->startSection('meta'); ?>
<title><?php echo e($article->name); ?> | <?php echo e($article->sectors()->first()->name); ?></title>
<meta name="description" content="<?php echo e($article->centocinquanta); ?>" />

<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo e($article->url); ?>" />
<meta property="og:title" content="<?php echo e($article->name); ?> | <?php echo e($article->sectors()->first()->name); ?>" />
<meta property="og:description" content="<?php echo e($article->centocinquanta); ?>" />
<?php if($article->has_image): ?>
	<meta property="og:image" content="<?php echo e(asset('storage/articles/full/'.$article->media()->where('mime','image')->first()->filename)); ?>" />
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0"><?php echo e($article->name); ?></h1>
                    <h2 class="hs-line-4 font-alt"><?php echo e($article->tags()->first()->name); ?> 
                    <?php if (Auth::check() && Auth::user()->isRole('admin')): ?> 
                    	<a class="btn btn-mod btn-gray btn-round" href="<?php echo e(url('articoli/'.$article->id.'/edit')); ?>">Modifica</a> 
                    	<a class="btn btn-mod btn-gray btn-round" href="<?php echo e(url('admin/articoli/'.$article->id.'/media')); ?>">Media</a> 
                    <?php endif; ?> 
                    </h2>

                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url($article->sectors()->first()->slug)); ?>"><?php echo e($article->sectors()->first()->name); ?></a>&nbsp;/&nbsp;
                        <span><?php echo e($article->name); ?></span>
                    </div>  
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

	<div class="col-sm-8">
	                            
	    <div class="blog-item mb-80 mb-xs-40">
	        
			<div class="blog-item-body">
	            <h1 class="mt-0 font-alt"><?php echo e($article->name); ?></h1>

	            <div class="blog-media mt-40 mb-40 mb-xs-30">
	                <ul class="clearlist content-slider">
	                	<?php if($article->has_image): ?>
	                		<?php $__currentLoopData = $article->media()->where('mime','image')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                   		<li><img src="<?php echo e(asset('storage/articles/display/'.$image->filename)); ?>" alt="<?php echo e($image->description); ?>" /></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                <?php endif; ?>
	                </ul>
	            </div>
				
				<div class="clearfix"></div>


				<p class="mt-30"><?php echo $article->description; ?></p>
	            
	            <div class="clearfix"></div>
	            
	                	<?php if($article->media()->where('mime','!=','image')->exists()): ?>
	                		<?php $__currentLoopData = $article->media()->where('mime','!=','image')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                   		<a class="btn btn-mod" target="_BLANK" href="<?php echo e(asset('storage/articles/original/'.$file->filename)); ?>"><?php echo e($file->description); ?></a>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                <?php endif; ?>

			</div>
			
		</div>

	</div>

	<div class="col-sm-4">
		<?php echo $__env->make('elements.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/articles/show.blade.php ENDPATH**/ ?>