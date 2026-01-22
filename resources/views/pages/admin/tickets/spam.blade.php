@extends('layouts.admin')

@section('title')
    SPAM
@stop

@section('content')


<div class="text-center">

	<div class="col-xs-12">
		<b class="btn btn-danger" style="padding: 18px 40px; font-size: 20px; font-weight: bolder; text-transform: uppercase;">CODICE<br>INVALIDO</b>
	</div>
	<div class="col-xs-12">
		per un ulteriore controllo vedere se esiste questo codice nella lista<br><br>
		<h4>{{session()->get('uuid')}}</h4>
	</div>

</div>

@stop
