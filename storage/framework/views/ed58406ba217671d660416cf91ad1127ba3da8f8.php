<?php $__env->startSection('meta'); ?>
<title><?php echo e($event->name); ?>: <?php echo e($event->location); ?> | <?php echo e(config('app.name')); ?></title>
<meta name="description" content="<?php echo e($event->centocinquanta); ?>">
<link rel="canonical" href="<?php echo e($event->url); ?>" />
<meta property="og:title" content="<?php echo e($event->name); ?>">
<meta property="og:description" content="<?php if($event->price): ?> BIGLIETTI ONLINE! <?php endif; ?> <?php echo e($event->centocinquanta); ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?php echo e($event->url); ?>">
<meta property="og:image" content="<?php echo e($event->image_full); ?>">
<meta property="og:image:alt" content="<?php echo e($event->name); ?>">

<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Event",
  "name": "<?php echo e($event->name); ?>",
  "url": "<?php echo e($event->url); ?>",
  "image": "<?php echo e($event->image); ?>",
  "sponsor": {
    "@type": "Organization",
    "name": "Associazione Tagliata Della Scala",
    "url": "<?php echo e(url('/')); ?>"
        },
  "startDate": "<?php echo e($event->start->format('d-m-Y H:i')); ?>",
  "endDate": "<?php echo e($event->finish->format('d-m-Y H:i')); ?>",
  "description": "<?php echo $event->centocinquanta; ?>",
  "location": {
    "@type": "Place",
    "name": "Vicenza",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "<?php echo e($event->location); ?>",
      "addressRegion": "Vicenza",
      "addressCountry": "Italy"
      }
    }
    <?php if($event->price): ?>
  ,
  "offers": {
    "@type": "Offer",
    "availability": "http://schema.org/InStock",
    "url": "<?php echo e($event->url); ?>",
    "price": "<?php echo e($event->no_currency_price); ?>",
    "priceCurrency": "EUR",
    "validFrom": "<?php echo e($event->created_at->format('c')); ?>"
  },
  "performer": {
  		"@type": "PerformingGroup",
  		"name": "Associazione Tagliata Della Scala"
   }
  <?php endif; ?>
}
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0"><?php echo e($event->name); ?></h1>
                    <h2 class="hs-line-4 font-alt"><?php echo e($event->location); ?> - <?php echo e($event->start->format('d/m/Y H:i')); ?> <?php if (Auth::check() && Auth::user()->isRole('admin')): ?> <a class="btn btn-mod btn-gray btn-round" href="<?php echo e(url('eventi/'.$event->id.'/edit')); ?>">Modifica</a> <?php endif; ?> </h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url('eventi')); ?>">Eventi</a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url('associazione')); ?>">Ass. Tagliata Della Scala</a>&nbsp;/&nbsp;
                        <span><?php echo e($event->name); ?></span>
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
	            <h3 class="mt-0 font-alt"><?php echo e($event->name); ?> | <?php echo e($event->start->format('d/m/Y H:i')); ?></h3>

	            <div class="blog-media mt-40 mb-40 mb-xs-30">
	                <ul class="clearlist content-slider">
	                	<?php if($event->has_image): ?>
	                		<?php $__currentLoopData = $event->media()->where('mime','image')->orderBy('created_at', 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                   		<li><img src="<?php echo e(asset('storage/events/display/'.$image->filename)); ?>" alt="<?php echo e($image->description); ?>" /></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                <?php endif; ?>
	                </ul>
	            </div>

				<div class="col-sm-6">
					<h4 class="mb-0 mt-0"><u>Dove:</u> <b><?php echo e($event->location); ?></b></h4>
					<?php if( $event->price ): ?>
						<h4 class="mb-0 mt-0"><u>Costo:</u> <b><?php echo e($event->formatted_price); ?></b></h4>
						<?php if( $event->price_reduced ): ?>
							<h4 class="mb-0 mt-0"><u>Ridotto:</u> <b><?php echo e($event->formatted_price_reduced); ?></b></h4>
						<?php endif; ?>
						<?php if( $event->ticket_availability ): ?>
							<h4 class="mb-0 mt-0"><u>Biglietti Disponibili:</u> <b><?php echo e($event->ticket_availability); ?></b></h4>
						<?php endif; ?>
					<?php endif; ?>
					<h4 class="mt-0"><u>Quando:</u> <b><?php echo e($event->start->formatLocalized("%A %d %B %Y")); ?></b></h4>
				</div>
				<?php if( $event->price ): ?>
					<div class="col-sm-6">
	                	<?php if( \Carbon\Carbon::now()->diffInDays($event->start) > 2 ): ?>
			                <div class="blog-item-foot mt-10">
			                	<?php echo Form::open(['url' => url('eventi/biglietti')]); ?>

			                		<input type="hidden" name="id" value=<?php echo e($event->id); ?>>
			                		<button class="btn btn-mod btn-round btn-large" type="submit">Prenota Biglietti <i class="fa fa-ticket"></i></button>

			                	<?php echo Form::close(); ?>

			                </div>
			            <?php else: ?>
			            	<div class="blog-item-foot mt-10">
			            		<p class="lead">Prevendita chiusa</p>
			            	</div>
			            <?php endif; ?>
					</div>
				<?php endif; ?>

				<div class="clearfix"></div>


				<p class="mt-30"><?php echo $event->description; ?></p>

				<?php if($event->media()->where('mime', 'doc')->exists()): ?>
				<div class="clearfix"></div>
				<div class="center">
					<?php $__currentLoopData = $event->media()->where('mime', 'doc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<a target="_BLANK" href="<?php echo e(asset('storage/events/original/'.$file->filename)); ?>" class="btn btn-mod btn-border btn-round btn-medium"><?php echo e($file->description); ?></a>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</div>
				<?php endif; ?>


			</div>

		</div>

	</div>

	<div class="col-sm-4">
		<?php echo $__env->make('elements.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/events/show.blade.php ENDPATH**/ ?>