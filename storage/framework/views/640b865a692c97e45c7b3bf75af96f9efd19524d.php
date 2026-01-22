<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="author" href="https://plus.google.com/118051754894364402890/about" />
    <link rel="publisher" href="https://www.google.com/+TagliatadellascalaItsapori" />
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <?php echo $__env->yieldContent('meta'); ?>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,300,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dosis:300,400,700">
    <link href="<?php echo e(asset('theme/css/theme.min.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>



<script async src="https://www.googletagmanager.com/gtag/js?id=UA-47846842-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-47846842-7');
</script>
</head>
<body>
    <div class="page" id="top">

        <?php echo $__env->make('elements.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('title'); ?>
        <?php echo $__env->yieldContent('full-content'); ?>
        <section class="page-section">
            <div class="container relative">
                <?php echo $__env->make('elements.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </section>

        <?php echo $__env->make('elements.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    <script src="<?php echo e(asset('theme/all.min.js')); ?>"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>