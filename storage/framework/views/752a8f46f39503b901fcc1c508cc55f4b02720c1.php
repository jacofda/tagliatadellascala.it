<?php $__env->startSection('title'); ?>
   Aggiungi Media
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-10 col-md-offset-1">
        <form action="<?php echo e(url('admin/media/add')); ?>" class="dropzone" id="dropzoneForm">
            <?php echo e(csrf_field()); ?>


            <div class="row">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </div>

        </form>
    </div>

    <div class="clearfix"></div>
    <div class="myline"></div>

    <?php if($event->media()->exists()): ?>
    <div class="col-sm-12 ">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>Descrizione</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $event->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="file<?php echo e($file->id); ?>">
                            <td>
                                <form method="POST" action="<?php echo e(url('admin/media/update')); ?>" class="relative updateDesc">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="id" value="<?php echo e($file->id); ?>">
                                    <input class="form-control" style="margin-bottom: 0;" type="text" name="description"  value="<?php echo e($file->description); ?>" />
                                    <button class="btn btn-primary save-btn" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span></button>
                                </form>
                            </td>
                            <td style="text-align: center;">
                                <?php if($file->mime == 'image'): ?>
                                    <a class="image-popup" href="<?php echo e(asset('storage/events/full/'.$file->filename)); ?>" >
                                        <img class="max100" src="<?php echo e(asset('storage/events/display/'.$file->filename)); ?>">
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <form method="POST" action="<?php echo e(url('admin/media/delete')); ?>" class="deleteMedia">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="directory" value="events">
                                    <input type="hidden" name="id" value="<?php echo e($file->id); ?>">
                                    <button class="btn btn-sm btn-danger" type="submit">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>

    <div class="clearfix"></div>
    <div class="myline"></div>

    <div class="text-center mt40">
        <a class="btn btn-primary" href="<?php echo e(url('admin/eventi')); ?>">Torna Agli Eventi</a><a class="btn btn-primary" href="<?php echo e($event->url); ?>">Vedi Evento</a>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

        Dropzone.options.dropzoneForm = {
            paramName: "file",
            maxFilesize: 10,
            dictDefaultMessage: "<strong>Clicca per caricare i files. (jpg, png, pdf, doc, xls, etc ...)</strong>",
            sending: function(file, xhr, formData) {
                formData.append("mediable_id", "<?php echo e($event->id); ?>");
                formData.append("mediable_type", "App\\Event");
                formData.append("directory", "events");
            },
            init: function () {
                this.on('queuecomplete', function () {
                   location.reload();
                });
            },
        };

    $('.image-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
    });

    $(".updateDesc").submit( function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.post( url, data, function(response) {
            $(this).find('input[name="description"]').val(response);
        });
    });

    $(".deleteMedia").submit( function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        var id = $(this).find('input[name="id"]').val();
        $.post( url, data, function(response) {
            if(response == "done")
            {
                $('table tr#file'+id).hide('400');
            }
        });
    });


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/events/addMedia.blade.php ENDPATH**/ ?>