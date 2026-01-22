<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?> | Admin | <?php echo e(config('app.name')); ?></title>
    <?php echo $__env->yieldContent('meta'); ?>
    <link href="<?php echo e(asset('css/admin.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/admin-override.css')); ?>" rel="stylesheet">

</head>
<body>

    <?php echo $__env->make('elements.menu-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="jumbotron">
        <div class="container">
            <h2><?php echo $__env->yieldContent('title'); ?></h2>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

        
    <script src="<?php echo e(asset('js/admin.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/layouts/admin.blade.php ENDPATH**/ ?>