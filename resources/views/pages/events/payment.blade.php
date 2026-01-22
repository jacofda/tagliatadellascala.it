@extends('layouts.app')

@section('meta')
<title>Pagamento</title>
<meta id="sk" name="publishable-key" content="{{ env('STRIPE_KEY') }}">
@stop

@section('css')
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
@stop

@section('title')

    <section class="small-section bg-dark-alfa-90">
        <div class="relative container align-left">

            <div class="row">

                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Dati per il Pagamento</h1>
                    <h2 class="hs-line-4 font-alt">Ultimo controllo prima dell'acquisto</h2>
                </div>

                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <a href="{{url('eventi')}}">Eventi</a>&nbsp;/&nbsp;
                        <a href="{{$event->url}}">{{$event->name}}</a>&nbsp;/&nbsp;
                        <span>Pagamento</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection


@section('content')



        <div class="widget col-md-6 mt-60">


               {{--  <form id="stripe-form" class="customer-details mb80 mb-xs-40">
                    {{ csrf_field() }}
                    <div class="group">
                        <label>
                            <span>Nome</span>
                            <input name="cardholder-name" class="field" placeholder="Carlo Russi" value="{{\Auth::user()->profile->nome . ' ' . \Auth::user()->profile->cognome}}"/>
                        </label>
                    </div>
                    <div class="group">
                        <label>
                            <span>Dati Carta</span>
                            <div id="card-element" class="field"></div>
                        </label>
                    </div>

                    <button type="submit" id="stripe-submit" class="btn btn-mod btn-border btn-small btn-round" style="padding:10px 22px;">Paga adesso</button>
                    <div class="outcome">
                        <div class="error" role="alert"></div>
                        <div class="success">
                          Success! You are going to be redirect shortly <span class="hidden token"></span>
                        </div>
                    </div>
                </form>

                <form action="{{url('eventi/pagamento')}}" method="post" id="payment-form" class="hidden">
                    {{ csrf_field() }}
                    <input type="hidden" name="stripe-token" value="">
                    <button type="submit">Go</button>
                </form> --}}

              <!--Example 1-->
              <div class="cell example example1" id="example-1">
                {{-- <form> --}}
                  <fieldset>
                    <div class="row">
                      <label for="cardholder-name">Nome e Cognome</label>
                      <input id="cardholder-name" type="text" placeholder="Nome Cognome" value="{{\Auth::user()->profile->nome . ' ' . \Auth::user()->profile->cognome}}" required="" autocomplete="name">
                    </div>
                    <div class="row">
                      <label for="cardholder-email">Indirizzo Email</label>
                      <input id="cardholder-email" type="email" placeholder="janedoe@gmail.com" value="{{\Auth::user()->email}}" required="" autocomplete="email">
                    </div>
                    {{-- <div class="row">
                      <label for="example1-phone" data-tid="elements_examples.form.phone_label">Telefono</label>
                      <input id="example1-phone" data-tid="elements_examples.form.phone_placeholder" type="tel" placeholder="(941) 555-0123" required="" autocomplete="tel">
                    </div> --}}
                  </fieldset>
                  <fieldset>
                    <div class="row">
                        <div id="card-element" class="field"></div>
                    </div>
                  </fieldset>
                  <button id="card-button" data-secret="<?= $intent->client_secret ?>">Paga Adesso {{$amount/100}} €</button>
                {{-- </form> --}}

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
                        <img class="max-300" src={{asset('storage/events/display/'.$event->media()->where('mime','image')->first()->filename)}} alt="{{$event->name}}" />
                    </div>
                    <div>
                        <a class="btn btn-mod btn-border btn-small btn-round" href="{{url('eventi/carrello')}}">Indietro</a>
                        <a class="btn btn-mod btn-border btn-small btn-round" href="{{$event->url}}">Vedi Evento</a>
                    </div>

                    <div class="mt-10">
                        Evento: <strong>{{$event->name}}</strong>
                    </div>

                    @if($tickets_reduced)
                        <div>
                            Biglietti interi: <strong>{{$tickets}} unità</strong>
                        </div>
                        <div class="mb-10">
                            Biglietti ridotti: <strong>{{$tickets_reduced}} unità</strong>
                        </div>
                        <div class="lead mt-0 mb-10">
                            Totale da Pagare: <strong>{{number_format( ($tickets*$event->price+$tickets_reduced*$event->price_reduced)/100 ,2,",",".")}}€</strong>
                        </div>
                    @else
                        <div class="mb-10">
                            Numero biglietti: <strong>{{$tickets}} unità</strong>
                        </div>
                        <div class="lead mt-0 mb-10">
                            Totale da Pagare: <strong>{{number_format( ($tickets*$event->price)/100 ,2,",",".")}}€</strong>
                        </div>
                    @endif



                </div>

            </div>

        </div>

@endsection

@section('scripts')
<script>

var stripe = Stripe('{{config("app.stripe_key")}}');
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
     //window.location.href = "{{config('app.url').'eventi/pagamento/errore/'}}"+result.error.code;;
    } else {

      $.post("{{url('eventi/pagamento')}}", {_token: "{{csrf_token()}}", response: result.paymentIntent.id}).done(function( data ) {
          if(data == "SUCCESS")
          {
              window.location.href = "{{config('app.url')}}eventi/pagamento/conferma";
          }
      });



    }
  });
});
</script>

@endsection
