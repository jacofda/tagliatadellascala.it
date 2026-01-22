<?php $__env->startSection('meta'); ?>
<title>Errore Pagamento</title>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('title'); ?>

    <section class="small-section bg-dark-alfa-90">
        <div class="relative container align-left">

            <div class="row">

                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Errore Pagamento</h1>
                    <h2 class="hs-line-4 font-alt">Pagamento NON è andato a buon fine</h2>
                </div>

                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url('eventi')); ?>">Eventi</a>&nbsp;/&nbsp;
                        <a href="<?php echo e($event->url); ?>"><?php echo e($event->name); ?></a>&nbsp;/&nbsp;
                        <span>Errore</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="widget col-md-6 col-md-offset-3">
        <h1 style="margin-bottom:20px; line-height:60px;"><?php echo e($element->decline_code); ?></h1>
        <p style="font-size:150%;"><?php echo e($element->description); ?></p>
        <a href="<?php echo e(url('eventi/pagamento')); ?>" class="btn btn-round btn-mod btn-large white-bg">Riprova</a>
        <br><br>
        <p class="lead" syle="font-size:150%;">Questo tentativo di pagamento non è andato a buon fine. Non ti preoccupare, l'azione è stata interrota. Ti consilgiamo di ritentare ponedo la massima attenzione ai tuoi dati.</p>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/events/failed.blade.php ENDPATH**/ ?>