<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$event->name}}</title>
    {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" /> --}}
    <link rel="stylesheet" href="{{public_path('css/bootstrap.min.css')}}" />
</head>
<body>

	<div class="container">
		<div class="row">
            <br>
            <div class="col-xs-12 center text-center" style="text-align:center">
			   <h2>{{$event->name}}</h2>
               <br><br>
           </div>

            <div class="col-xs-12 center text-center" style="text-align:center;">
			    <img src="{{$event->image_for_pdf}}" class="img-responsive" style="text-align:center;display:block;margin-left:auto;margin-right:auto;">
                <br><br>
            </div>
            <br>
			<h4 class="mt-40"><b>Data Evento</b>: {{$event->start->format('d/m/Y H:i')}}</h4>
			<h4><b>Luogo Evento</b>: {{$event->location}}</h4>
			<div class="ticket-wrapper">
				@foreach( json_decode($ticket->ticket_json) as $type => $quantity )
					<h3>Biglietto {{$type}}: <span>{{$quantity}} unità</span></h3>
				@endforeach
			</div>
		</div>


		<div class="row">
			<div class="col-xs-6">
				{!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(285)->generate(url('tickets/'.$ticket->code)) !!}
			</div>
			<div class="col-xs-6">
				<p class="mt-60">Nome: <b>{{$profile->nome}}</b></p>
				<p>Cognome: <b>{{$profile->cognome}}</b></p>
				<p>Email: <b>{{$profile->user->email}}</b></p>
				<p>UUID: <b>{{$ticket->code}}</b></p>
				<p>Acquistato il: <b>{{$ticket->created_at->format('d/m/Y')}}</b></p>
			</div>
		</div>
	</div>

</body>
</html>
