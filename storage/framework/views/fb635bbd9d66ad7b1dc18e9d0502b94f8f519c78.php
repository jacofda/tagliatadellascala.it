<?php $__env->startSection('meta'); ?>
<title>Crea il Tuo Profilo</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Crea Profilo</h1>
                    <h2 class="hs-line-4 font-alt">Alcuni dati per l'acquisto dei biglietti</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <span>Crea Profilo</span>
                    </div>  
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        
        <div class="col-sm-8 col-sm-offset-2">
            <?php echo Form::open(['url' => url('profilo')]); ?>

                <?php echo $__env->make('pages.profiles.form',  ['submitButtonText' => 'Crea Profilo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo Form::close(); ?>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/profiles/create.blade.php ENDPATH**/ ?>