<?php if( strpos(request()->url(), "tags/scala-dei-sapori-2019") !== false ): ?>

	<div class="widget">
		<h5 class="widget-title font-alt">Tags SCALA DEI SAPORI 2019</h5>
		<div class="widget-body">
			<div class="tags">
				<a href="<?php echo e(url('tags/intrattenimento')); ?>">Intrattenimento</a>
				<a href="<?php echo e(url('tags/stand')); ?>">Stand</a>
	        </div>
		</div>
	</div>

<?php else: ?>

	<div class="widget">
		<h5 class="widget-title font-alt">Tutte le Tags</h5>
		<div class="widget-body">
			<div class="tags">
				<?php $__currentLoopData = \App\Tag::onlyUsed(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<a href="<?php echo e(url('tags/'.$tag->slug)); ?>"><?php echo e($tag->name); ?></a>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </div>
		</div>
	</div>

<?php endif; ?>
<?php if( strpos(request()->url(), "scala-dei-sapori") !== false ): ?>

	<div class="widget">
		<h5 class="widget-title font-alt">Scala dei Sapori</h5>
		<div class="widget-body">
	        <div class="widget-text clearfix">           
	            <img src="<?php echo e(asset('img/scala/logo-scala-dei-sapori.png')); ?>" alt="tagliata della scala primolano" width="70" class="img-circle left img-left">	      
				Manifestazione gastronomica nata nel 2011 con l'obiettivo di degustare i prodotti locali e valorizzare la Tagliata della Scala e la strada che collega Primolano e Fastro	        
	        </div>
		</div>
	</div>

<?php else: ?>

	<div class="widget">
		<h5 class="widget-title font-alt">Tagliata Della Scala</h5>
		<div class="widget-body">
	        <div class="widget-text clearfix">           
	            <img src="<?php echo e(asset('img/logo-footer.png')); ?>" alt="tagliata della scala primolano" width="70" class="img-circle left img-left">	      
				Rivalutare il patrimonio storico della Valbrenta e delle aree montane circostanti: l’idea è quella di unire le varie fortificazioni in un unico grande museo territoriale.	        
	        </div>
		</div>
	</div>

<?php endif; ?><?php /**PATH /var/www/html/resources/views/elements/sidebar.blade.php ENDPATH**/ ?>