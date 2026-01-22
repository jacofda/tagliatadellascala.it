<div class="form-group col-sm-12<?php echo e($errors->has('name') ? ' input-danger' : ''); ?>">
    <span>Nome:</span>
    <?php echo Form::text('name', null, ['placeholder' => 'Proloco Cismon', 'class' => 'form-control']); ?>

    <?php if($errors->has('name')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('name')); ?></strong>
        </span>
    <?php endif; ?>
</div>



<div class="form-group col-sm-12<?php echo e($errors->has('description') ? ' input-danger' : ''); ?>">
	<?php echo Form::textarea('description', null, ['placeholder' => 'Descrizione ...', 'row' => '4', 'class' => 'form-control']); ?>

    <?php if($errors->has('description')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('description')); ?></strong>
        </span>
    <?php endif; ?>	
</div>

<div class="col-sm-8 col-sm-offset-2">
    <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText); ?>">
</div><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/tags/form.blade.php ENDPATH**/ ?>