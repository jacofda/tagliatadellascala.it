<?php $__env->startSection('meta'); ?>
<title>Tutte le foto delle edizioni della Scala Dei Sapori</title>

    <meta name="description" content="Tutte le foto delle edizioni della Scala Dei Sapori" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo e(url('gallerie/scala-dei-sapori')); ?>" />
    <meta property="og:title" content="Foto | Scala Dei Sapori" />
    <meta property="og:description" content="Tutte le foto delle edizioni della Scala Dei Sapori" />
    <meta property="og:image" content="<?php echo e(\App\Sector::find(1)->galleries()->latest()->first()->image_full); ?>" />
    <meta property="og:image:type" content="image/jpeg" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Foto E Gallerie</h1>
                    <h2 class="hs-line-4 font-alt">Tutte le foto delle edizioni della Scala Dei Sapori</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url('scala-dei-sapori/la-storia')); ?>">Scala dei Sapori</a>&nbsp;/&nbsp;
                        <span>Gallerie</span>
                    </div>  
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        
        <div class="col-sm-8">
            
            <div class="row multi-columns-row">
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-6 mb-60 mb-xs-40">
                        <div class="post-prev-img">
                            <a href="<?php echo e($gallery->url); ?>">
                                <img src="<?php echo e(asset('storage/galleries/display/'.$gallery->media()->first()->filename)); ?>" alt="<?php echo e($gallery->name); ?>" />
                            </a>
                        </div>
                        
                        <div class="post-prev-title font-alt">
                            <a href="<?php echo e($gallery->url); ?>"><?php echo e($gallery->name); ?></a>
                        </div>
                        
                        <div class="post-prev-info font-alt">
                            <a href="<?php echo e(url('tags/'.$gallery->tags()->first()->slug)); ?>"><?php echo e($gallery->tags()->first()->name); ?></a> | <?php echo e($gallery->created_at->format('m/Y')); ?>

                        </div>
                        
                        <div class="post-prev-text">
                            <?php echo e($gallery->centocinquanta); ?> 
                        </div>
                        
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
        <div class="col-sm-4">
            <?php echo $__env->make('elements.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/galleries/scala.blade.php ENDPATH**/ ?>