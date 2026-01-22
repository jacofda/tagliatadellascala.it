@extends('layouts.app')

@section('meta')

<title>La Scala Dei Sapori | Edizione 2017</title>
	<link rel="canonical" href="https://www.tagliatadellascala.it/scala-dei-sapori/edizione-2017">
    <meta name="description" content="9 settembre 2018 - Ottava Edizione della Scala dei Sapori: una passeggiata gastronomica alla scoperta di prodotti e ricette locali lungo l'ottocentesca opera di sbarramento italiana sul confine per controllare l'importante arteria tra la Valsugana, il Feltrino ed il Primiero. Per l'occasione chiusa al traffico." />
    <meta name="keywords" content="Scala dei sapori 2018, Primolano, scala dei sapori" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.tagliatadellascala.it/scala-dei-sapori/edizione-2018" />
    <meta property="og:title" content="La Scala Dei Sapori | Ottava Edizione" />
    <meta property="og:description" content="9 settembre 2018 - Ottava Edizione della Scala dei Sapori: una passeggiata gastronomica alla scoperta di prodotti e ricette locali lungo l'ottocentesca opera di sbarramento italiana sul confine per controllare l'importante arteria tra la Valsugana, il Feltrino ed il Primiero. Per l'occasione chiusa al traffico." />
    <meta property="og:image" content="{{asset('img/fb/2018/fb-scala-2018.jpg')}}" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="1230" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="La Scala Dei Sapori - Ottava Edizione" />
@stop



@section('title')



	<section class="page-section bg-dark-alfa-90">
	    <div class="relative container align-left">

	        <div class="row">
	            <div class="col-md-8">
	                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Edizione 2018</h1>
	                <h2 class="hs-line-4 font-alt">Scala dei Sapori edizione 2018</h2>
	            </div>

	            <div class="col-md-4 mt-30">
	                <div class="mod-breadcrumbs font-alt align-right">
	                    <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
	                    <a href="{{url('scala-dei-sapori')}}">Scala dei Sapori</a>&nbsp;/&nbsp;
	                    <span>Edizione 2018</span>
	                </div>

	            </div>
	        </div>

	    </div>
	</section>
@stop

@section('content')

    <div class="section-text mb-60 mb-sm-40">
      	<div class="row">
        	<div class="col-sm-6 mb-sm-50 mb-xs-30"> 
          		<h4 class="mt-0 font-alt">Sapori 2018</h4>
          		<ol>
	          		<li>APERITIVO - Alpini San Vito</li>
					<li>BOCCONCINI DI FUNGHI VALBRENTA - Pro loco Cismon</li>
					<li>FEA DE LAMON - Ass. Tutela Fea de Lamon</li>
					<li>TROTINE - Pro Loco Tezze Valsugana</li>
					<li>TAGLIATELLE AL SUGO DI SELVAGGINA - Ristorazione Alternativa</li>
					<li>FORMAGGI E MIELE - Az. La Piovega e Miele di Dino Pedron</li>
					<li>GOULASH - El Ciod</li>
					<li>SALAME E ACETO - Alpini di Fastro</li>
					<li>TORTINO DI CEREALI - Osteria da Doro</li>
					<li>SORBETTO E TISANE - La Casa del Capitano di Roberto Zannini</li>
					<li>DOLCI - Ristorante Ai merli e 3F</li>
					<li>GRAPPE - Distilleria Le Crode</li>
				</ol>

          		<h4 class="mt-1 font-alt">L'Altra Scala 2018</h4>
          		<ol>
	          		<li>ESPOSIZIONE PERMANENTE DEL CONFINE PERSSO EX SCUOLE ELEMENTARI</li>
					<li>ANTICA RIMESSA DELLE LOCOMOTIVE</li>
					<li>RESTAURATRICE ARTEMISIA</li>
					<li>VISITE GUIDATE ALLA FORTIFICAZIONE</li>
					<li>ARTISTA ENZA SARTOR</li>
					<li>ALICE ROSSI: I MAGNAGATTI E L'INGREDIENTE SEGRETO</li>
					<li>MOSTRA FOTOGRAFICA A CURA DI CUMAN ALBERTO</li>
					<li>ESPOSIZIONE A CURA DI  GRUPPO ARTISTI VALBRENTA</li>
				</ol>
          		<h4 class="mt-1 font-alt">Divertimento 2018</h4>
          		<ol>
	          		<li>BALLO E ANIMAZIONE - con Bassano Swing Out</li>
					<li>MAGO DADO E PALLONCINI</li>
					<li>SPAZIO BIMBI</li>
					<li>SPETTACOLO TEATRALE "UNA VOLTA C'ERANO LE MINIERE - Gruppo teatrale Tarantas</li>
					<li>CLINICA MOBILE PUPAZZI - Ass. Piccolo Principe Dott. Clown</li>
					<li>GONFIABILI</li>
				</ol>
        	</div>

        	<div class="col-sm-6 mb-sm-50 mb-xs-30">
        		<a title="mappa" target="_BLANK" href="{{asset('img/sds2018/mappa-grande.jpg')}}">
          			<img class="img-responsive" alt="scala dei sapori primolano piazza" src="{{asset('img/sds2018/mappa.jpg')}}">
          		</a>
          		<div class="text-center mt-40">
            		<a class="btn btn-round btn-mod btn-large white-bg" href="https://www.tagliatadellascala.it/eventi/scala-dei-sapori/scala-dei-sapori-2018" target="_BLANK" > Vedi dettagli SCALA DEI SAPORI 2018</a>
          		</div>
        	</div>
      	</div>
    </div>

@stop