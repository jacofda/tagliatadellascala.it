@extends('layouts.admin')

@section('title')
    Controllo
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
	@if(!$ticket->checked)
	<div class="col-xs-12">
		{!! Form::open(['url' => url('tickets/'.$ticket->id)]) !!}
			<button type="submit" class="btn btn-primary" style="padding: 18px 40px; font-size: 20px; font-weight: bolder;"> ACCETTA </button>
			<br><br>
			<small>premendo qui accetti il biglietto come valido <br>l'acquirente ha diritto di entrare</small>
		{!! Form::close() !!}
	</div>
	@else
		<div class="col-xs-12">
			<b class="btn btn-danger" style="padding: 18px 40px; font-size: 20px; font-weight: bolder; text-transform: uppercase;">Entrato</b>
		</div>
	@endif

</div>

@stop
