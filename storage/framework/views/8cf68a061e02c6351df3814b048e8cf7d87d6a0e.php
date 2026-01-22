<?php $__env->startSection('meta'); ?>
 <title>Scala dei Sapori come acquistare biglietti</title>
 <link rel="canonical" href="<?php echo e(config('app.url')); ?>/faq-biglietti-online" />
 <meta name="description" content="Come acquistare biglietti online per gli eventi dell'associazione Tagliata della Scala di PRimolano. Scala dei Sapori">
  <?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
	<section class="small-section bg-dark-alfa-90">
	    <div class="relative container align-left">
	        
	        <div class="row">
	            
	            <div class="col-md-8">
	                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">FAQ</h1>
	                <h2 class="hs-line-4 font-alt">Acquisto biglietti online</h2>
	            </div>
	            
	            <div class="col-md-4 mt-30">
	                <div class="mod-breadcrumbs font-alt align-right">
	                    <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;<span>FAQ</span>
	                </div>
	            </div>
	        </div>
	        
	    </div>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="col-sm-6 mb-xs-40">
	<h4>Aquisto bilgietti</h4>
	<dl class="accordion">
		<dt>
			<a href="">Registrazione/Login</a>
		</dt>
		<dd>
			Effettua il login/registrazione e compila il profilo (nome, cognome, email e telefono).
		</dd>
		<dt>
			<a href="">Seleziona quantità</a>
		</dt>
		<dd>
			Vai alla pagina evento clicca "prenota bilgietti", seleziona la quantità desiderata e tipologia (Intero o Ridotto).
		</dd>
		<dt>
			<a href="">Paga con carta di credito</a>
		</dt>
		<dd>
			Paga con carta di credito e vedi il tuo biglietto nella pagina di conferma o nel tuo profilo.
		</dd>
	</dl>
</div>

<div class="col-sm-6 mb-xs-40">
	<h4>All'evento</h4>
	<dl class="accordion">
		<dt>
			<a href="">Stampa o Scarica PDF</a>
		</dt>
		<dd>
			Puoi stampare o salvare nel tuo cellulare il bilgietto.
		</dd>
		<dt>
			<a href="">Mostra Biglietto</a>
		</dt>
		<dd>
			Mostra il tuo bilgietto all'entrata dell'evento. Il personale scansionerà il qr_code presente nel tuo biglietto.
		</dd>
		<dt>
			<a href="">Enjoy</a>
		</dt>
		<dd>
			Divertiti e grazie 
		</dd>
	</dl>
</div>

<div class="col-sm-6 col-sm-offset-3 mb-xs-40">
	<h4>Altre domande</h4>
	<dl class="accordion">
		<dt>
			<a href="">Comperare Biglietti</a>
		</dt>
		<dd>
			I biglietti possono essere acquisati online o nei principali locali e ristoranti del territorio
		</dd>
		<dt>
			<a href="">Recupero password</a>
		</dt>
		<dd>
			Puoi sempre recuperare la password dalla pagina login cliccando resetta password.
		</dd>
		<dt>
			<a href="">Sicurezza dei miei dati</a>
		</dt>
		<dd>
			Il sito tagliatadellascala usa protocollo di sicurezza HTTPS, ogni chiamata ai server viene encriptata con una chiave da 256 bit. Il nostro sito salva solo nome, cognome, email e telefono, solo nel caso che serva ricontattarla per eventuali problemi con i biglietti. I dati della carta non vengono salvati in questo sito ma da stripe.com e non vengono visti da nessuno.
		</dd>
	</dl>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/faq.blade.php ENDPATH**/ ?>