<?php $__env->startSection('meta'); ?>
<title>Notizie dell'Associazione Tagliata Della Scala - Primolano</title>
<meta name="description" content="Notizie e Approfondimenti dell'Associazione Tagliata Della Scala di Primolano" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Notizie</h1>
                    <h2 class="hs-line-4 font-alt">Associazione Tagliata Della Scala</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url('associazione/chi-siamo')); ?>">Ass. Tagliata Della Scala</a>&nbsp;/&nbsp;
                        <span>Notizie</span>
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
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-6 mb-60 mb-xs-40">
                        <?php if($article->media()->where('mime', 'image')->exists() ): ?>
                            <div class="post-prev-img">
                                <a href="<?php echo e($article->url); ?>">
                                    <img src="<?php echo e(asset('storage/app/articles/display/'.$article->media()->first()->filename)); ?>" alt="<?php echo e($article->name); ?>" />
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="post-prev-title font-alt">
                            <a href="<?php echo e($article->url); ?>"><?php echo e($article->name); ?></a>
                        </div>
                        
                        <div class="post-prev-info font-alt">
                            <a href="<?php echo e(url('tags/'.$article->tags()->first()->slug)); ?>"><?php echo e($article->tags()->first()->name); ?></a> | <?php echo e($article->created_at->format('m/Y')); ?>

                        </div>
                        
                        <div class="post-prev-text">
                            <?php echo e($article->centocinquanta); ?> 
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/articles/associazione.blade.php ENDPATH**/ ?>