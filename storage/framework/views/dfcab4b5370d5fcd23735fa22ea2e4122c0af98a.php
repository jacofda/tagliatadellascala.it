<?php $__env->startSection('meta'); ?>
<title>Pagamento</title>
<meta id="sk" name="publishable-key" content="<?php echo e(env('STRIPE_KEY')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>
.page-section{padding:50px 0;}
#waitLoading{display:none; background: #28a745;padding:1% 3%;margin-top: 30px; border-radius: 6px;}
#waitLoading h4{margin-top: 30px; margin-bottom: 0;color:#fff;font-weight: bolder;}
#waitLoading p{color:#fff;}
.example.example1 * {
  font-family: Roboto, Open Sans, Segoe UI, sans-serif;
  font-size: 16px;
  font-weight: 500;
}

.example.example1 fieldset {
  margin: 0 15px 20px;
  padding: 0;
  border-style: none;
  background-color: #fff;
  box-shadow: 0 6px 9px rgba(50, 50, 50, 0.06), 0 2px 5px rgba(0, 0, 0, 0.08),
    inset 0 1px 0 #fff;
  border-radius: 4px;
}

.example.example1 .row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  margin-left: 15px;
  margin-right: 15px;
}

.example.example1 .row + .row {
  border-top: 1px solid #ddd;
}

.example.example1 label {
  width: 45%;
  min-width: 70px;
  padding: 11px 0;
  color: #aaa;
  font-weight: normal;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  margin-bottom: 0;
}

.example.example1 input, .example.example1 button {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  outline: none;
  border-style: none;
}

.example.example1 input:-webkit-autofill {
  -webkit-text-fill-color: #fce883;
  transition: background-color 100000000s;
  -webkit-animation: 1ms void-animation-out;
}

.example.example1 .StripeElement--webkit-autofill {
  background: transparent !important;
}

.example.example1 .StripeElement {
  width: 100%;
  padding: 11px 15px 11px 0;
}

.example.example1 input {
  width: 100%;
  padding: 11px 15px 11px 0;
  color: #1b1b1b;
  background-color: transparent;
  -webkit-animation: 1ms void-animation-out;
}

.example.example1 input::-webkit-input-placeholder {
  color: #87bbfd;
}

.example.example1 input::-moz-placeholder {
  color: #87bbfd;
}

.example.example1 input:-ms-input-placeholder {
  color: #87bbfd;
}

.example.example1 button {
  display: block;
  width: calc(100% - 30px);
  height: 40px;
  margin: 40px 15px 0;
  background-color: #925d32;
  box-shadow: 0 6px 9px rgba(50, 50, 93, 0.06), 0 2px 5px rgba(0, 0, 0, 0.08),
    inset 0 1px 0 #ffb9f6;
  border-radius: 4px;
  color: #fff;
  font-weight: 600;
  cursor: pointer;
}

.example.example1 button:active {
  background-color: #d782d9;
  box-shadow: 0 6px 9px rgba(50, 50, 93, 0.06), 0 2px 5px rgba(0, 0, 0, 0.08),
    inset 0 1px 0 #e298d8;
}

.example.example1 .error svg .base {
  fill: #fff;
}

.example.example1 .error svg .glyph {
  fill: #6772e5;
}

.example.example1 .error .message {
  color: #fff;
}

.example.example1 .success .icon .border {
  stroke: #87bbfd;
}

.example.example1 .success .icon .checkmark {
  stroke: #fff;
}

.example.example1 .success .title {
  color: #fff;
}

.example.example1 .success .message {
  color: #9cdbff;
}

.example.example1 .success .reset path {
  fill: #fff;
}


</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>

    <section class="small-section bg-dark-alfa-90">
        <div class="relative container align-left">

            <div class="row">

                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Dati per il Pagamento</h1>
                    <h2 class="hs-line-4 font-alt">Ultimo controllo prima dell'acquisto</h2>
                </div>

                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="<?php echo e(url('/')); ?>">Home</a>&nbsp;/&nbsp;
                        <a href="<?php echo e(url('eventi')); ?>">Eventi</a>&nbsp;/&nbsp;
                        <a href="<?php echo e($event->url); ?>"><?php echo e($event->name); ?></a>&nbsp;/&nbsp;
                        <span>Pagamento</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>



        <div class="widget col-md-6 mt-60">


               

              <!--Example 1-->
              <div class="cell example example1" id="example-1">
                
                  <fieldset>
                    <div class="row">
                      <label for="cardholder-name">Nome e Cognome</label>
                      <input id="cardholder-name" type="text" placeholder="Nome Cognome" value="<?php echo e(\Auth::user()->profile->nome . ' ' . \Auth::user()->profile->cognome); ?>" required="" autocomplete="name">
                    </div>
                    <div class="row">
                      <label for="cardholder-email">Indirizzo Email</label>
                      <input id="cardholder-email" type="email" placeholder="janedoe@gmail.com" value="<?php echo e(\Auth::user()->email); ?>" required="" autocomplete="email">
                    </div>
                    
                  </fieldset>
                  <fieldset>
                    <div class="row">
                        <div id="card-element" class="field"></div>
                    </div>
                  </fieldset>
                  <button id="card-button" data-secret="<?= $intent->client_secret ?>">Paga Adesso <?php echo e($amount/100); ?> €</button>
                

              </div>

              <div id="waitLoading">
                  <h4 class="text-center">Transazione in Corso</h4>
                  <div class="text-center">
                      <p>Per favore attendi che la transizione sia terminata prima di cliccare o ricaricare la pagina</p>
                  </div>
            </div>


        </div>


        <div class="widget col-md-5 col-md-offset-1" >

            <div class="widget-body" >
                <div class="col-sm-12 text text-center">
                    <div class="align-right" style="margin-top:30px; padding-top: 30px; min-height: 100px;">
                        <img class="max-300" src=<?php echo e(asset('storage/events/display/'.$event->media()->where('mime','image')->first()->filename)); ?> alt="<?php echo e($event->name); ?>" />
                    </div>
                    <div>
                        <a class="btn btn-mod btn-border btn-small btn-round" href="<?php echo e(url('eventi/carrello')); ?>">Indietro</a>
                        <a class="btn btn-mod btn-border btn-small btn-round" href="<?php echo e($event->url); ?>">Vedi Evento</a>
                    </div>

                    <div class="mt-10">
                        Evento: <strong><?php echo e($event->name); ?></strong>
                    </div>

                    <?php if($tickets_reduced): ?>
                        <div>
                            Biglietti interi: <strong><?php echo e($tickets); ?> unità</strong>
                        </div>
                        <div class="mb-10">
                            Biglietti ridotti: <strong><?php echo e($tickets_reduced); ?> unità</strong>
                        </div>
                        <div class="lead mt-0 mb-10">
                            Totale da Pagare: <strong><?php echo e(number_format( ($tickets*$event->price+$tickets_reduced*$event->price_reduced)/100 ,2,",",".")); ?>€</strong>
                        </div>
                    <?php else: ?>
                        <div class="mb-10">
                            Numero biglietti: <strong><?php echo e($tickets); ?> unità</strong>
                        </div>
                        <div class="lead mt-0 mb-10">
                            Totale da Pagare: <strong><?php echo e(number_format( ($tickets*$event->price)/100 ,2,",",".")); ?>€</strong>
                        </div>
                    <?php endif; ?>



                </div>

            </div>

        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

var stripe = Stripe('<?php echo e(config("app.stripe_key")); ?>');
var elements = stripe.elements({locale: 'it'});
var cardElement = elements.create('card',{
    hidePostalCode: true,
    iconStyle: 'solid',
    style: {
      base: {
        iconColor: '#ccc',
        color: '#1b1b1b',
        fontWeight: 500,
        fontFamily: 'sans-serif',
        fontSize: '16px',
        fontSmoothing: 'antialiased',

        ':-webkit-autofill': {
          color: '#fce883',
        },
        '::placeholder': {
          color: '#aaa',
        },
      },
      invalid: {
        iconColor: '#dc3545',
        color: '#dc3545',
      },
    },
  });
cardElement.mount('#card-element');

var cardholderName = document.getElementById('cardholder-name');
var cardholderEmail = document.getElementById('cardholder-email');
var cardButton = document.getElementById('card-button');
var clientSecret = cardButton.dataset.secret;


console.log(cardholderName.value, cardholderEmail.value)

cardButton.addEventListener('click', function(ev) {
     $('#waitLoading').css('display', 'block');
  stripe.handleCardPayment(
    clientSecret, cardElement, {
      payment_method_data: {
        billing_details: {
            name: cardholderName.value,
            email: cardholderEmail.value,
        }
      }
    }
  ).then(function(result) {

    if (result.error) {
      console.log('ERROR');
      console.log(result);
      console.log(result.error.code);
     //window.location.href = "<?php echo e(config('app.url').'eventi/pagamento/errore/'); ?>"+result.error.code;;
    } else {

      $.post("<?php echo e(url('eventi/pagamento')); ?>", {_token: "<?php echo e(csrf_token()); ?>", response: result.paymentIntent.id}).done(function( data ) {
          if(data == "SUCCESS")
          {
              window.location.href = "<?php echo e(config('app.url')); ?>eventi/pagamento/conferma";
          }
      });



    }
  });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/479065.cloudwaysapps.com/kpdkwexcdb/public_html/resources/views/pages/events/payment.blade.php ENDPATH**/ ?>