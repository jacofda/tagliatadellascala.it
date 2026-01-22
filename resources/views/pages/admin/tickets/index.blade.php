@extends('layouts.admin')

@section('title')
    Biglietti
@stop

@section('content')
	<div class="col-sm-8">
		<p><u>filtra x evento</u></p>
		<a class="btn btn-default" href="{{url('tickets')}}">TUTTI</a>
		@foreach( \App\Event::whereNotNull('price')->get() as $event )
			<a class="btn btn-default" href="{{url('tickets?filter='.$event->id)}}">{{$event->name}}</a>
		@endforeach
	</div>
	<div class="col-sm-4">
		<p><u>ordina per data di acquisto</u></p>
		<a class="btn btn-default" href="{{url('tickets?sort=DESC')}}">ultimi</a>
		<a class="btn btn-default" href="{{url('tickets?sort=ASC')}}">primi</a>
	</div>
	<div class="clearfix"></div>
	<div class="table-responsive" style="margin-top:50px;">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Evento</th>
					<th>Data</th>
					<th>Nome</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($tickets as $ticket)
					<tr>
						<td>{{$ticket->id}}</td>
						<td>{{$ticket->event->name}}</td>
						<td>{{$ticket->created_at->format('d/m/Y')}}</td>
						<td>{{$ticket->user->profile->nome}}  {{$ticket->user->profile->cognome}}</td>
						<td>
	                        {!!Form::open([ 'method'  => 'delete', 'url' => url('articoli/'.$ticket->slug) ]) !!}
	                            <button class="btn btn-danger btn-xs" type="submit">Elimina</button>
	                            <a class="btn btn-success btn-xs" href="{{url('ticket/'.$ticket->id)}}">Vedi</a>
	                        {!!Form::close()!!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="clearfix"></div>

@stop
