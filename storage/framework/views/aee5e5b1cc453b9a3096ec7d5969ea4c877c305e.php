<?php $__env->startSection('meta'); ?> 
<title>Modifica email e password</title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>

<section class="page-section bg-dark-alfa-90">
    <div class="relative container align-left">
        
        <div class="row">
            
            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Modifica dati Utente</h1>
                <h2 class="hs-line-4 font-alt">Qui potrai modificare/cambiare email e password</h2>
            </div>
            
            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                    <a href="<?php echo e(url('profilo/'.$user->profile->id)); ?>">Profilo</a>&nbsp;/&nbsp;
                    <span>Modifica dati account</span>
                </div>
                
            </div>
        </div>
        
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <section class="page-section">
        <div class="container relative">

			<?php echo Form::model($user, ['method' => 'PATCH', 'url' => 'user/' . $user->id, 'class' =>'form']); ?>

				
				<div class="row">
					<div class="col-md-5 col-md-offset-3">
		                <div class="mb-20 mb-md-10">
		                    <!-- Email -->
		                    <input type="email" name="email" id="email" class="input-md form-control" value="<?php echo e($user->email); ?>" placeholder="Email" maxlength="155">
		                </div>    
		                
		                <div class="mb-20 mb-md-10">
		                    <!-- Password -->
		                    <input type="password" name="password" id="password" class="input-md form-control" placeholder="Password" maxlength="100">
		                </div>

		                <div class="mb-20 mb-md-10">
		                    <!-- Password -->
		                    <input type="password" name="password_confirmation" id="password" class="input-md form-control" placeholder="Password" maxlength="100">
		                </div>
						
						<div class="mb-10 center">
	                        <a class="btn btn-mod btn-border btn-small btn-round" href="<?php echo e(url('profilo/'.$user->profile->id)); ?>">Indietro</a>
	                        <input class="btn btn-mod btn-border btn-small btn-round" type="submit" value="Aggiorna"> 
	                    </div>

	                    
					    <?php if($errors->has('password')): ?>
					    	<div class="alert error"><span class="help-block"><strong style="color:#f9f9f9">* password non combaciano</strong></span></div>
					    <?php endif; ?>	 
					    <?php if($errors->has('email')): ?>
					    	<div class="alert error"><span class="help-block"><strong style="color:#f9f9f9">* email già in uso o invalida </strong></span></div>
					    <?php endif; ?>	

					</div>
				</div>


			<?php echo Form::close(); ?>


		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/profiles/edit-login.blade.php ENDPATH**/ ?>