<div class="form-group col-sm-8<?php echo e($errors->has('name') ? ' input-danger' : ''); ?>">
    <label>Titolo:</label>
    <?php echo Form::text('name', null, ['placeholder' => 'Concerto musica classica', 'class' => 'form-control']); ?>

    <?php if($errors->has('name')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('name')); ?></strong>
        </span>
    <?php endif; ?>
</div>

<div class="form-group col-sm-4<?php echo e($errors->has('categories') ? ' input-danger' : ''); ?>">
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



<div class="form-group col-sm-8<?php echo e($errors->has('location') ? ' input-danger' : ''); ?>">
    <label>Indirizzo:</label>
    <?php echo Form::text('location', null, ['placeholder' => 'Sede o esterno', 'class' => 'form-control']); ?>

    <?php if($errors->has('location')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('location')); ?></strong>
        </span>
    <?php endif; ?>
</div>

<div class="form-group col-sm-4<?php echo e($errors->has('sectors') ? ' input-danger' : ''); ?>">
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

<div class="form-group col-sm-6<?php echo e($errors->has('start') ? ' input-danger' : ''); ?>">
    <label>Data Inizio:</label>
     <input id="date-start" class="form-control" name="start" type="text" value="<?php echo e(isset($event->start) ? $event->start->format('d/m/Y H:i') : date('d/m/Y H:i')); ?>">
    <?php if($errors->has('start')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('start')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<div class="form-group col-sm-6<?php echo e($errors->has('finish') ? ' input-danger' : ''); ?>">
    <label>Data Fine:</label>
    <input id="date-finish" class="form-control" name="finish" type="text" value="<?php echo e(isset($event->finish) ? $event->finish->format('d/m/Y H:i') : date('d/m/Y H:i')); ?>">
    <?php if($errors->has('finish')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('finish')); ?></strong>
        </span>
    <?php endif; ?>
</div>


<div class="form-group col-sm-12<?php echo e($errors->has('price') ? ' input-danger' : ''); ?>">
    <label>Costo Biglietto</label>
    <input class="form-control" name="price" type="number" value="<?php echo e(isset($event->price) ? $event->price : old('price')); ?>">
    <?php if($errors->has('price')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('price')); ?></strong>
        </span>
    <?php endif; ?>
    <p class="info">I prezzo va indicato in CENTESIMI. 5euro = 500. Lascia vuoto se non vuoi l'acquisto online.</p> 
</div>

<div class="form-group col-sm-12<?php echo e($errors->has('price_reduced') ? ' input-danger' : ''); ?>">
    <label>Costo Biglietto Ridotto</label>
    <input class="form-control" name="price_reduced" type="number" value="<?php echo e(isset($event->price_reduced) ? $event->price_reduced : old('price_reduced')); ?>">
    <?php if($errors->has('price_reduced')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('price_reduced')); ?></strong>
        </span>
    <?php endif; ?>
    <p class="info">I prezzo va indicato in CENTESIMI. 5euro = 500. Lascia vuoto se non vuoi l'acquisto online.</p> 
</div>

<div class="form-group col-sm-12<?php echo e($errors->has('ticket_availability') ? ' input-danger' : ''); ?>">
    <label>Biglietti disponibili</label>
    <input class="form-control" name="ticket_availability" type="number" value="<?php echo e(isset($event->ticket_availability) ? $event->ticket_availability : old('ticket_availability')); ?>">
    <?php if($errors->has('ticket_availability')): ?>
        <span class="error">
            <strong class="color-danger"><?php echo e($errors->first('ticket_availability')); ?></strong>
        </span>
    <?php endif; ?>
    <p class="info">Lascia vuoto se non vuoi l'acquisto online.</p> 
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

        $('#date-start').datetimepicker({
            locale: 'it'
        });
        $('#date-finish').datetimepicker({
            locale: 'it'
        });
        $('#summernote').summernote({lang: 'it-IT', minHeight: 300});

    })(jQuery);   
</script>
<?php $__env->stopSection(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/events/form.blade.php ENDPATH**/ ?>