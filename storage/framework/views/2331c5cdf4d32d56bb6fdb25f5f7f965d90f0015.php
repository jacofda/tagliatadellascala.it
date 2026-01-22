<?php $__env->startSection('meta'); ?>
<title>Modifica il Tuo Profilo</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Modifica Profilo</h1>
                    <h2 class="hs-line-4 font-alt">Rivedi e cambia i tuoi dati</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url('profilo/'.$profile->id)); ?>">Profilo</a>&nbsp;/&nbsp;
                        <span>Modifica Profilo</span>
                    </div>  
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        
        <div class="col-sm-8 col-sm-offset-2">
            <?php echo Form::model($profile, ['method' => 'PATCH',  'url' => url('profilo/'.$profile->id)]); ?>

                <?php echo $__env->make('pages.profiles.form',  ['submitButtonText' => 'Modifica Profilo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo Form::close(); ?>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/profiles/edit.blade.php ENDPATH**/ ?>