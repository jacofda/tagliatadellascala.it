<div class="pt-10 from-group col-sm-6<?php echo e($errors->has('nome') ? ' input-danger' : ''); ?>">
    <label>Nome:</label>
    <?php echo Form::text('nome', null, ['placeholder' => 'Nome', 'class' => 'input-md round form-control']); ?>

    <?php if($errors->has('nome')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('nome')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<div class="pt-10 from-group col-sm-6<?php echo e($errors->has('cognome') ? ' input-danger' : ''); ?>">
    <label>Nome:</label>
    <?php echo Form::text('cognome', null, ['placeholder' => 'Cognome', 'class' => 'input-md round form-control']); ?>

    <?php if($errors->has('cognome')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('cognome')); ?></strong>
        </span>
    <?php endif; ?>
</div>

<div class="pt-10 from-group col-sm-6<?php echo e($errors->has('email') ? ' input-danger' : ''); ?>">
    <label>Email:</label>
    <?php echo Form::text('email', \Auth::user()->email, ['placeholder' => 'Email', 'class' => 'input-md round form-control']); ?>

    <?php if($errors->has('email')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('email')); ?></strong>
        </span>
    <?php endif; ?>
</div>

<div class="pt-10 from-group col-sm-6<?php echo e($errors->has('telefono') ? ' input-danger' : ''); ?>">
    <label>Telefono:</label>
    <?php echo Form::text('telefono', null, ['placeholder' => 'telefono', 'class' => 'input-md round form-control']); ?>

    <?php if($errors->has('telefono')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('telefono')); ?></strong>
        </span>
    <?php endif; ?>
</div>

<div class="clearfix"></div>
<br>

<hr>
<div class="col-sm-8 col-sm-offset-2">
    <input class="submit_btn btn btn-mod btn-medium btn-round btn-full" type="submit" value="<?php echo e($submitButtonText); ?>">
</div>
<?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/profiles/form.blade.php ENDPATH**/ ?>