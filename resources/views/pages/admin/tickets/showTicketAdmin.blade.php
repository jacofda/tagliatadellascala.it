@extends('layouts.admin')

@section('title')
    Dettagli biglietto
@stop

@section('content')


<div class="text-center">

	<div class="col-xs-12 small">
		NOME COGNOME
	</div>
	<div class="col-xs-12 border-bottom">
		{{$profile->nome}}  {{$profile->cognome}}
	</div>


	<div class="col-xs-12 small">
		BIGLIETTI
	</div>
	<div class="col-xs-12 border-bottom">
		@foreach( json_decode($ticket->ticket_json) as $type => $quantity)
			{{$type}}: {{$quantity}}<br>
		@endforeach
	</div>

	<div class="col-xs-12 small">
		CODICE
	</div>
	<div class="col-xs-12 border-bottom">
		{{$ticket->code}}
	</div>

	<div class="col-xs-12 small">
		DATA ACQUISTO
	</div>
	<div class="col-xs-12 border-bottom">
		{{$ticket->created_at->format('d/m/Y')}}
	</div>

	<div class="col-xs-12 small">
		PROVA d' ACQUISTO
	</div>
	<div class="col-xs-12 border-bottom">
		{{$ticket->charge_response_id}}
	</div>


</div>

@stop
