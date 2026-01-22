<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($event->name); ?></title>
    
    <link rel="stylesheet" href="<?php echo e(public_path('css/bootstrap.min.css')); ?>" />
</head>
<body>

	<div class="container">
		<div class="row">
            <br>
            <div class="col-xs-12 center text-center" style="text-align:center">
			   <h2><?php echo e($event->name); ?></h2>
               <br><br>
           </div>

            <div class="col-xs-12 center text-center" style="text-align:center;">
			    <img src="<?php echo e($event->image_for_pdf); ?>" class="img-responsive" style="text-align:center;display:block;margin-left:auto;margin-right:auto;">
                <br><br>
            </div>
            <br>
			<h4 class="mt-40"><b>Data Evento</b>: <?php echo e($event->start->format('d/m/Y H:i')); ?></h4>
			<h4><b>Luogo Evento</b>: <?php echo e($event->location); ?></h4>
			<div class="ticket-wrapper">
				<?php $__currentLoopData = json_decode($ticket->ticket_json); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<h3>Biglietto <?php echo e($type); ?>: <span><?php echo e($quantity); ?> unità</span></h3>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>


		<div class="row">
			<div class="col-xs-6">
				<?php echo \SimpleSoftwareIO\QrCode\Facades\QrCode::size(285)->generate(url('tickets/'.$ticket->code)); ?>

			</div>
			<div class="col-xs-6">
				<p class="mt-60">Nome: <b><?php echo e($profile->nome); ?></b></p>
				<p>Cognome: <b><?php echo e($profile->cognome); ?></b></p>
				<p>Email: <b><?php echo e($profile->user->email); ?></b></p>
				<p>UUID: <b><?php echo e($ticket->code); ?></b></p>
				<p>Acquistato il: <b><?php echo e($ticket->created_at->format('d/m/Y')); ?></b></p>
			</div>
		</div>
	</div>

</body>
</html>
<?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pdf/ticket.blade.php ENDPATH**/ ?>