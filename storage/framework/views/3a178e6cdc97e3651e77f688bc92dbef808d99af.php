<?php $__env->startSection('meta'); ?>
<title>Tuo Profilo <?php echo e($profile->name); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Tuo Profilo</h1>
                    <h2 class="hs-line-4 font-alt">Vedi i tuoi acquisti / modifica dati</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <span>Il mio Profilo</span>
                    </div>  
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-4">
            <h5 class="widget-title font-alt">I tuoi dati</h5>
            <div class="widget-body">
                <ul class="clearlist widget-menu">
                    <li><a href="#">Nome: </a><small> <?php echo e($profile->nome); ?></small></li>
                    <li><a href="#">Cognome: </a><small> <?php echo e($profile->cognome); ?></small></li>
                    <li><a href="#">Email: </a><small> <?php echo e($profile->email); ?></small></li>
                    <li><a href="#">Telefono: </a><small> <?php echo e($profile->telefono); ?></small></li>
                </ul>
                <br><br>

                <div class="tags">
                    <a href="<?php echo e(url('profilo/'.$profile->id.'/edit')); ?>" title="per l'acquisto dei biglietti">Modifica dati Profilo</a>
                    <a href="<?php echo e(url('user/'.Auth::user()->id.'/edit')); ?>" title="per il login">Modifica dati Account</a>
                </div>

            </div>
        </div>
        <div class="col-sm-7 col-sm-offset-1">
            <h5 class="widget-title font-alt">I tuoi biglietti</h5>
            <div class="widget-body">
                <?php $__empty_1 = true; $__currentLoopData = \Auth::user()->tickets()->orderBy('created_at', 'DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                
                    <div class="ticket-wrapper">
                        <div class="top-left"><?php echo e($loop->iteration); ?>)</div>
                        <div class="top-right"><a class="btn btn-round btn-mod white-bg" href="<?php echo e(asset('storage/tickets/'.$ticket->media()->latest()->first()->filename)); ?>" target="_blank"><i class="fa fa-download"></i>SCARICA BIGLIETTO</a></div>
                        <p><b>Acquistato il </b>: <?php echo e($ticket->created_at->format('d/m/Y')); ?></p>
                        <p><b>Evento </b>: <?php echo e(\App\Event::find($ticket->event_id)->name); ?></p>
                        <p><b>Totale Pagato</b>: <?php echo e($ticket->total); ?> €</p>
                        <p><b>Valido per</b>: <?php echo e($ticket->valid_for); ?></p>
                        <p><b>Codice</b>: <?php echo e($ticket->code); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="ticket-wrapper">
                        <a class="btn btn-round btn-mod white-bg" href="<?php echo e(url('eventi')); ?>"> Vedi i Prossimi Eventi</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/profiles/show.blade.php ENDPATH**/ ?>