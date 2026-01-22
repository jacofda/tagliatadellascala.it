<?php $__env->startSection('meta'); ?>
<title>Invia link per password reset</title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>

<section class="small-section bg-dark-alfa-90">
    <div class="relative container align-left">
        
        <div class="row">
            
            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Reset Password</h1>
                <h2 class="hs-line-4 font-alt">Scrivi la tua email per il password reset</h2>
            </div>
            
            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;<span>Reset Password</span>
                </div>
                
            </div>
        </div>
        
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container relative">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">



                <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <form  class="form contact-form" id="contact_form" role="form" method="POST" action="<?php echo e(route('password.email')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <input id="email" type="email" class="input-md round form-control" placeholder="la tua email" name="email" required="" value="<?php echo e(old('email')); ?>" >
                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>

                    
                    <div class="form-group">
                        <div class="pt-10">
                                <button type="submit" class="submit_btn btn btn-mod btn-small btn-round float" id="login-btn">Spedisci a questa email <br> un link per resettare la password</button>
                        </div> 
                    </div>

                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>