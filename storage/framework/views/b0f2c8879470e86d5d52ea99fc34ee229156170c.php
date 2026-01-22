<?php $__env->startSection('meta'); ?>
<title>Registrazione nuovo utente</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>

<section class="small-section bg-dark-alfa-90">
    <div class="relative container align-left">
        
        <div class="row">
            
            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Nuovo account</h1>
                <h2 class="hs-line-4 font-alt">Solo email e password</h2>
            </div>
            
            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;<span>Registrazione</span>
                </div>
                
            </div>
        </div>
        
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="page-section">
    <div class="container relative">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                    <?php echo e(csrf_field()); ?>

                    
                    <div class="clearfix">

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <input id="Email" type="email" class="input-md round form-control" placeholder="La tua email" name="email" pattern=".{3,100}" required="" value="<?php echo e(old('email')); ?>">
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

                                <input id="password" type="password" name="password" class="input-md round form-control" placeholder="Password" pattern=".{5,100}" required="">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>

                        </div>

                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">

                                <input id="password-confirm" type="password" name="password_confirmation" class="input-md round form-control" placeholder="Re-inserisci la password" pattern=".{5,100}" required="">

                                <?php if($errors->has('password_confirmation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                                <?php endif; ?>

                        </div>

                        <div class="pt-10">
                            <button type="submit" class="submit_btn btn btn-mod btn-medium btn-round btn-full" id="reg-btn">Registrati</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/auth/register.blade.php ENDPATH**/ ?>