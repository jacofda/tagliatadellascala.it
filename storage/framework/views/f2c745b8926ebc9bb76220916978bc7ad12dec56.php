<?php $__env->startComponent('mail::message'); ?>
# Il tuo bilgietto

Ciao <b><?php echo e($profile->nome); ?> <?php echo e($profile->cognome); ?></b>,<br>
salva questa email nel tuo cellulare così il giorno <?php echo e($event->start->format('d/m/Y')); ?> non dovrai far altro che mostrare il biglietto in allegato.<br>
In alternativa puoi scaricare il bilgietto dalla tua pagina profilo nel sito.

Grazie,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/emails/ticket.blade.php ENDPATH**/ ?>