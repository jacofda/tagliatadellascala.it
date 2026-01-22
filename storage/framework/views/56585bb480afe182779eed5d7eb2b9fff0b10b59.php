<?php $__env->startSection('meta'); ?>
<title><?php echo e($gallery->name); ?> | <?php echo e($gallery->sectors()->first()->name); ?></title>
<meta name="description" content="<?php echo e($gallery->centocinquanta); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Galleria</h1>
                    <h2 class="hs-line-4 font-alt"><?php echo e($gallery->name); ?> <?php if (Auth::check() && Auth::user()->isRole('admin')): ?> <a class="btn btn-mod btn-gray btn-round" href="<?php echo e(url('gallerie/'.$gallery->id.'/edit')); ?>">Modifica</a> <?php endif; ?> </h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url($gallery->sectors()->first()->slug)); ?>"><?php echo e($gallery->sectors()->first()->name); ?></a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url('gallerie/'.$gallery->sectors()->first()->slug)); ?>">Gallerie</a>&nbsp;/&nbsp;
                        <span><?php echo e($gallery->name); ?></span>
                    </div>  
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('full-content'); ?>
<section class="page-section pb-0">
    <div class="relative">
        <div class="container">
            <div class="works-filter align-center">
                <?php echo $gallery->description; ?>

            </div>
        
        <ul class="works-grid work-grid-3 clearfix font-alt hover-white hide-titles masonry" id="work-grid">
            
            <?php $__currentLoopData = $gallery->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>              
                <li class="work-item mix">
                    <a href="<?php echo e(asset('storage/galleries/full/'.$image->filename)); ?>" class="work-lightbox-link mfp-image">
                        <div class="work-img">
                            <img src="<?php echo e(asset('storage/galleries/display/'.$image->filename)); ?>" alt="<?php echo e($image->description); ?>" />
                        </div>
                        <div class="work-intro">
                            <h3 class="work-title"><?php echo e($gallery->name); ?></h3>
                            <div class="work-descr">
                                <?php echo e($image->description); ?>

                            </div>
                        </div>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/galleries/show.blade.php ENDPATH**/ ?>