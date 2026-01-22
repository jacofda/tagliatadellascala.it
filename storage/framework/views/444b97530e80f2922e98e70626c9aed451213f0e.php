<?php $__env->startSection('meta'); ?>
<title>Scala dei Sapori | News / Gallerie / Foto / Eventi</title>
<meta name="description" content="Tutti i contenuti riguardanti la Scala dei Sapori di Primolano" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Scala dei Sapori</h1>
                    <h2 class="hs-line-4 font-alt">News / Gallerie / Foto / Eventi Tagliata della scala</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url('scala-dei-sapori')); ?>">Scala dei Sapori</a>
                    </div>  
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-sm-8">
        <div class="row multi-columns-row">
    
            <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-md-6 col-lg-6 mb-60 mb-xs-40">

                    <?php if($content->has_image): ?>
                        <div class="post-prev-img">
                            <a href="<?php echo e($content->url); ?>"><img src="<?php echo e($content->image); ?>" alt="<?php echo e($content->name); ?>" /></a>
                        </div>
                    <?php endif; ?>

                    <div class="post-prev-title font-alt">
                        <a href="<?php echo e($content->url); ?>">
                            <?php if( strpos($content->tags()->first()->slug, '-sapori') !== false): ?>
                                <b>Stand</b>
                            <?php else: ?>
                                <b><?php echo e($content->class); ?></b>
                            <?php endif; ?>
                            - <?php echo e($content->name); ?>

                        </a>
                    </div>

                    <div class="blog-item-data">
                        <i class="fa fa-clock-o"></i> <?php echo e($content->created_at->format('d/m/Y')); ?>

                        <span class="separator">&nbsp;</span>
                        <i class="fa fa-folder-open"></i>
                        <?php $__currentLoopData = $content->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->last): ?>
                                <a href="<?php echo e(url('tags/'.$tag->slug)); ?>"><?php echo e($tag->name); ?></a>
                            <?php else: ?>
                                <a href="<?php echo e(url('tags/'.$tag->slug)); ?>"><?php echo e($tag->name); ?></a>,
                            <?php endif; ?>  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="blog-item-body">
                        <p><?php echo e($content->centocinquanta); ?></p>
                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="col-sm-4">
        <?php echo $__env->make('elements.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/collections/scala.blade.php ENDPATH**/ ?>