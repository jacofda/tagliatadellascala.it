<div class="form-group col-sm-12<?php echo e($errors->has('name') ? ' input-danger' : ''); ?>">
    <label>Titolo:</label>
    <?php echo Form::text('name', null, ['placeholder' => 'Concerto musica classica', 'class' => 'form-control']); ?>

    <?php if($errors->has('name')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('name')); ?></strong>
        </span>
    <?php endif; ?>
</div>

<div class="form-group col-sm-6<?php echo e($errors->has('categories') ? ' input-danger' : ''); ?>">
    <label>Categoria:</label>
    <div class="select-option">
        <select name="categories[]" class="category form-control" multiple="multiple">
            <option></option>
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( in_array($id, $selected) ): ?>
                    <option selected value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                <?php else: ?>
                    <option value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                <?php endif; ?>    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <?php if($errors->has('categories')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('categories')); ?></strong>
        </span>
    <?php endif; ?>
</div>


<div class="form-group col-sm-6<?php echo e($errors->has('sectors') ? ' input-danger' : ''); ?>">
    <label>Settore:</label>
    <div class="select-option">
        <select name="sectors[]" class="sector form-control" multiple="multiple">
            <option></option>
            <?php $__currentLoopData = $sectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( in_array($id, $sector) ): ?>
                    <option selected value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                <?php else: ?>
                    <option value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                <?php endif; ?>    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <?php if($errors->has('sectors')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('sectors')); ?></strong>
        </span>
    <?php endif; ?>
</div>


<div class="form-group col-sm-12<?php echo e($errors->has('description') ? ' input-danger' : ''); ?>">
    <label>Descrizione:</label>
    <?php echo Form::textarea('description', null, ['class' => 'form-control', 'id' => 'summernote']); ?>

    <?php if($errors->has('description')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('description')); ?></strong>
        </span>
    <?php endif; ?>
</div>

<div class="clearfix"></div>
<br>

<hr>
<div class="col-sm-8 col-sm-offset-2">
    <input class="btn btn-primary" type="submit" value="<?php echo e($submitButtonText); ?>">
</div>


<?php $__env->startSection('scripts'); ?>
<script>
    (function (){
        $(".category").select2({placeholder:"almeno una categoria"});
        $(".sector").select2({placeholder:"almeno un settore"});
        $('#summernote').summernote({lang: 'it-IT', minHeight: 300});
    })(jQuery);   
</script>
<?php $__env->stopSection(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/articles/form.blade.php ENDPATH**/ ?>