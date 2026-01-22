@extends('layouts.app')

@section('meta')
<title>Contatti scale di Primolano associazione tagliata della scala</title>

    <meta name="keywords" content="Primolano, Scale di Primolano">
    <meta name="description" content="Via Capovilla 10 Primolano Vicenza. Contatti ed Informazioni sulla scala dei sapori e l'associazione tagliata della scala" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{url('contatti')}}" />
    <meta property="og:title" content="Contatti | Tagliata della scala e Scala dei Sapori" />
    <meta property="og:description" content="Contatti ed Informazioni sulla scala dei sapori e l'associazione tagliata della scala" />
    <meta property="og:image" content="{{asset('img/fb/contatti-tagliata-della-scala.jpg')}}" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="1230" />
    <meta property="og:image:height" content="630" />

@stop

@section('title')

	<section class="small-section bg-dark-alfa-90">
	    <div class="relative container align-left">

	        <div class="row">

	            <div class="col-md-8">
	                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Contatti</h1>
	                <h2 class="hs-line-4 font-alt">Associazione Tagliata della Scala e Scala dei Sapori</h2>
	            </div>

	            <div class="col-md-4 mt-30">
	                <div class="mod-breadcrumbs font-alt align-right">
	                    <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;<span>Contatti</span>
	                </div>
	            </div>
	        </div>

	    </div>
	</section>

@stop


@section('content')

	<h2 class="section-title font-alt mb-70 mb-sm-40">Hai Domande? Vuoi più informazioni?</h2>
    <div class="row mb-60 mb-xs-40">
      	<div class="col-md-8 col-md-offset-2">
        	<div class="row">
          		<div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
            		<div class="contact-item">
              			<div class="ci-icon"><i class="fa fa-phone"></i></div>
              			<div class="ci-title font-alt">Chiamaci</div>
              			<div class="ci-text">+39 333 814 2546</div>
            		</div>
          		</div>
          		<div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
            		<div class="contact-item">
              			<div class="ci-icon"><i class="fa fa-map-marker"></i></div>
              			<div class="ci-title font-alt">Indirizzo</div>
              			<div class="ci-text">Via Capovilla 10/a, 36020, Cismon Del Grappa (VI)</div>
            		</div>
          		</div>
          		<div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
            		<div class="contact-item">
              			<div class="ci-icon"><i class="fa fa-envelope"></i></div>
              			<div class="ci-title font-alt">Email</div>
						<div class="ci-text"><a href="mailto:info@tagliatadellascala.it">info@tagliatadellascala.it</a></div>
            		</div>
          		</div>
        	</div>
      	</div>
    </div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			{!! Form::open(['url' => url('contatti'), 'id' => 'reCaptchaForm']) !!}
            <input id="recaptchaResponse" name="recaptcha_response" type="hidden">
			<div class="clearfix">
                <div class="cf-left-col">
                    <div class="form-group">
                        <input type="text" name="name" class="input-md round form-control" placeholder="Nome" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="input-md round form-control" placeholder="Email" value="{{old('email')}}" required>
                    </div>
                    <div class="form-group">
						<select name="to_whom" class="input-md round form-control">
                            <option value="tagliata">Ass. Tagliata della Scala</option>
                            <option value="scala">Scala Dei Sapori</option>
                        </select>
                    </div>
                </div>
                <div class="cf-right-col">

                    <div class="form-group">
                        <textarea name="body" class="input-md round form-control" style="height: 134px;" placeholder="Messaggio">{{old('body')}}</textarea>
                    </div>
                </div>
            </div>

            <div class="clearfix">
                <div class="cf-left-col">
                    <div class="form-tip pt-20">
                        <i class="fa fa-info-circle"></i>
                        <a href="{{url('privacy')}}" target="_BLANK">Consenso ex art. 23 del d.lgs. N.196/2003</a>
                    </div>
                </div>
                <div class="cf-right-col">
                    <div class="align-right pt-10">
                        <button type="submit" class="submit_btn btn btn-mod btn-medium btn-round">Invia</button>
                    </div>
                </div>
            </div>
			{!! Form::close() !!}
		</div>
	</div>

@stop

@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?render={{config('app.recaptcha_site')}}&onload=onloadCallback&render=explicit"></script>

    <script>
        function onloadCallback() {
          grecaptcha.ready(function() {
            grecaptcha.execute("{{config('app.recaptcha_site')}}", {
              action: 'contact_form'
            }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
          });
        }
    </script>
@stop
