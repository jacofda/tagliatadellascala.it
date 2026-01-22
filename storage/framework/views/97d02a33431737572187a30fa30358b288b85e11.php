<nav class="main-nav dark transparent stick-fixed">
    <div class="full-wrapper relative clearfix">
        <div class="nav-logo-wrap local-scroll">
            <a href="<?php echo e(url('/')); ?>" class="logo">
                <img src="<?php echo e(asset('img/logo.png')); ?>" alt="logo associazione tagliata della scala" />
            </a>
        </div>
        <div class="mobile-nav">
            <i class="fa fa-bars"></i>
        </div>
        <div class="inner-nav desktop-nav">
            <ul class="clearlist"> 

                <?php if (Auth::check() && Auth::user()->isRole('admin')): ?>
                    <li><a href="<?php echo e(url('home')); ?>">Admin</a></li>  
                <?php endif; ?>
                <li>
                    <a href="#" class="mn-has-sub">Associazione <i class="fa fa-angle-down"></i></a>   
                    <ul class="mn-sub">
                        <li><a href="<?php echo e(url('associazione/chi-siamo')); ?>" title="la storia della scala dei sapori">Chi Siamo</a></li>
                        <li><a href="<?php echo e(url('gallerie/associazione')); ?>" title="galleria immagini scala dei sapori">Gallerie / Foto</a></li>
                        <li><a href="<?php echo e(url('articoli/associazione')); ?>" title="news e articolo associazione tagliata della scala">News / Articoli</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="mn-has-sub">Scala dei Sapori <i class="fa fa-angle-down"></i></a>   
                    <ul class="mn-sub">
                        <li><a href="<?php echo e(url('scala-dei-sapori/la-storia')); ?>" title="la storia della scala dei sapori">La Storia</a></li>   
                        <li><a href="<?php echo e(url('scala-dei-sapori/diventa-espositore')); ?>" title="come diventare espositore">Diventa Espositore</a></li>
                        <li><a href="<?php echo e(url('gallerie/scala-dei-sapori')); ?>" title="galleria immagini scala dei sapori">Gallerie / Foto</a></li>
                        <li><a href="<?php echo e(url('scala-dei-sapori/stands')); ?>" title="stand scala dei sapori">Stands</a></li>
                        <li><a href="<?php echo e(url('scala-dei-sapori/edizione-2019')); ?>" title="edizione 2019">Edizione 2019</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo e(url('eventi')); ?>" title="eventi associazione tagliata della scala">Eventi</a></li>
                <li><a href="<?php echo e(url('video')); ?>" title="video associazione tagliata della scala">Video</a></li>                      
                <li><a href="<?php echo e(url('contatti')); ?>" title="contatti associazione tagliata della scala">Contatti</a></li>
                <?php if(Auth::guest()): ?>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo e(route('login')); ?>"><i class="fa fa-lock"></i> &nbsp;Login</a></li>
                <?php else: ?>
                    <li>
                        <a href="#" class="mn-has-sub">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo e(Auth::user()->name); ?> <i class="fa fa-angle-down"></i></a>
                        <ul class="mn-sub">
                            <?php if(Auth::user()->profile()->exists()): ?>
                                <li><a href="<?php echo e(url('profilo/'.Auth::user()->profile->id)); ?>">Dati Profilo</a></li>
                            <?php else: ?>
                                <li><a href="<?php echo e(url('profilo/create')); ?>">Crea Profilo</a></li>
                            <?php endif; ?>
                            <li>
                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?></form>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>                                                    
        </div>
    </div>
</nav><?php /**PATH /var/www/html/resources/views/elements/menu.blade.php ENDPATH**/ ?>