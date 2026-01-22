<?php $__env->startSection('meta'); ?>
<title>Eventi</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>

	<section class="small-section bg-dark-alfa-90">
	    <div class="relative container align-left">
	        
	        <div class="row">
	            
	            <div class="col-md-8">
	                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Eventi</h1>
	                <h2 class="hs-line-4 font-alt">We share our best ideas in our blog</h2>
	            </div>
	            
	            <div class="col-md-4 mt-30">
	                <div class="mod-breadcrumbs font-alt align-right">
	                    <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;<span>Eventi</span>
	                </div>
	            </div>
	        </div>
	        
	    </div>
	</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

	<div class="col-md-8">

		<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="blog-item">
                <h2 class="blog-item-title font-alt"><a href="blog-single-sidebar-right.html"><?php echo e($event->name); ?></a></h2>
                <div class="blog-item-data">
                    <i class="fa fa-clock-o"></i> <?php echo e($event->created_at->format('d/m/Y')); ?>

                    <span class="separator">&nbsp;</span>
                    <i class="fa fa-user"></i> <?php echo e($event->sectors()->first()->name); ?>

                    <span class="separator">&nbsp;</span>
                    <i class="fa fa-folder-open"></i>
                    <?php $__currentLoopData = $event->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($loop->last): ?>
                        	<a href="<?php echo e(url('tags/'.$tag->slug)); ?>"><?php echo e($tag->name); ?></a>
						<?php else: ?>
							<a href="<?php echo e(url('tags/'.$tag->slug)); ?>"><?php echo e($tag->name); ?></a>,
						<?php endif; ?> 	
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <span class="separator">&nbsp;</span>
                    <i class="fa fa-calendar"></i> <?php echo e($event->start->formatLocalized('%A %d %B %Y')); ?>

                </div>
                
                <!-- Media Gallery -->
                <div class="blog-media">
                    <ul class="clearlist content-slider">
                    	<?php $__currentLoopData = $event->media()->where('mime','image')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><img src="<?php echo e(asset('storage/events/display/'.$image->filename)); ?>" alt="<?php echo e($image->description); ?>" /></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="blog-item-body">
                    <p>
                        <?php echo e($event->centocinquanta); ?>

                    </p>
                </div>

                <?php if( $event->price ): ?>
                	<?php if( \Carbon\Carbon::now()->diffInDays($event->start) > 0 ): ?>
		                <div class="blog-item-foot">
		                	<?php echo Form::open(['url' => url('eventi/biglietti')]); ?>

		                		<input type="hidden" name="id" value=<?php echo e($event->id); ?>>
		                		<button class="btn btn-mod btn-round btn-large" type="submit">Prenota Biglietti <i class="fa fa-ticket"></i></button>
		                	<?php echo Form::close(); ?>

		                </div>
		            <?php endif; ?>
	            <?php endif; ?>

            </div>

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	</div>

	<div class="col-md-4">
		<?php echo $__env->make('elements.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/galleries/index.blade.php ENDPATH**/ ?>