<?php $__env->startSection('meta'); ?>
<title>Login</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>

<section class="small-section bg-dark-alfa-90">
    <div class="relative container align-left">
        
        <div class="row">
            
            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Login</h1>
                <h2 class="hs-line-4 font-alt">Accedi al tuo account con email e password</h2>
            </div>
            
            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;<span>Login</span>
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
            <div class="col-md-6 col-md-offset-3">
                
                <form class="form contact-form" id="contact_form" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="clearfix">
                        
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <input id="email" type="email" class="input-md round form-control" placeholder="la tua email" name="email" required="" value="<?php echo e(old('email')); ?>" >
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <input id="password" type="password" class="input-md round form-control" name="password" placeholder="Password" required="">
                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                    </div>
                    
                    <div class="clearfix relative">
                     
                                       
                            <div class="form-tip pt-20 ab-left">
                                <a  href="<?php echo e(url('/password/reset')); ?>">Non ricordi la password?</a>
                            </div>

                        

                            <div class="align-right pt-10 ab-right">
                                    <button type="submit" class="submit_btn btn btn-mod btn-small btn-round float" id="login-btn">Login</button>
                                    <a href="<?php echo e(url('register')); ?>" class="submit_btn btn btn-mod btn-small btn-round float">Registrati</a>
                            </div> 


                </form>
            </div>
        </div>
    </div>
</section>



<?php $__env->stopSection(); ?>                       
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>