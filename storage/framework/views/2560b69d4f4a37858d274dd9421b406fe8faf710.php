<?php if($event): ?>
    <section class="page-section">
        <div class="container relative">
            <div class="row">
                <h3 class="uppercase mb-40 pl-15">Prossimo Evento | <?php echo e($event->start->formatLocalized("%a %d %B %Y")); ?></h3>
                <div class="col-md-7 mb-sm-40">

                    <div class="work-full-media mt-0 white-shadow">
                        <ul class="clearlist work-full-slider owl-carousel">
                            <?php $__currentLoopData = $event->media()->where('mime','image')->orderBy('created_at', 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($event->url); ?>">
                                        <img src="<?php echo e(asset('storage/events/display/'.$image->filename)); ?>" alt="<?php echo e($image->description); ?>" />
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                </div>

                <div class="col-md-5 col-lg-4 col-lg-offset-1">

                    <div class="text">
                        <h3 class="font-alt mb-30 mb-xxs-10"><?php echo e($event->name); ?></h3>
                        <?php if($event->price): ?>
                            <div class="mt-10">
                                <a href="<?php echo e($event->url); ?>" class="btn btn-mod btn-border btn-round btn-medium" >Vedi dettagli e Biglietti</a>
                                
                            </div>
                        <?php else: ?>
                            <div class="mt-40">
                                <a href="<?php echo e($event->url); ?>" class="btn btn-mod btn-border btn-round btn-medium" >Vedi dettagli</a>
                            </div>
                        <?php endif; ?>



                    </div>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/elements/next-event.blade.php ENDPATH**/ ?>