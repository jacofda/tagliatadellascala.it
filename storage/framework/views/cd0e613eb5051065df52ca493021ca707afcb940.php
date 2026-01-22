<nav class="navbar navbar-default navbar-static-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">Torna al sito</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="<?php echo e(url('home')); ?>">Dashboard</a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Articoli <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo e(url('articoli/create')); ?>">Crea Nuovo</a></li>
                    <li><a href="<?php echo e(url('admin/articoli')); ?>">Vedi Articoli</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventi <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo e(url('eventi/create')); ?>">Crea Nuovo</a></li>
                    <li><a href="<?php echo e(url('admin/eventi')); ?>">Vedi Eventi</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallerie <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo e(url('gallerie/create')); ?>">Crea Nuova</a></li>
                    <li><a href="<?php echo e(url('admin/gallerie')); ?>">Vedi Gallerie</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Video <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo e(url('video/create')); ?>">Crea Nuovo</a></li>
                    <li><a href="<?php echo e(url('admin/video')); ?>">Vedi Video</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tags <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo e(url('tags/create')); ?>">Crea Nuova</a></li>
                    <li><a href="<?php echo e(url('admin/tags')); ?>">Vedi Tags</a></li>
                </ul>
            </li>

            <li><a href="<?php echo e(url('tickets')); ?>">Vedi Tickets</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"><?php echo e(csrf_field()); ?></form>
            </li>
        </ul>
    </div>
</nav><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/elements/menu-admin.blade.php ENDPATH**/ ?>