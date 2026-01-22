@extends('layouts.admin')

@section('title') Modifica {{$event->name}} @stop

@section('content')
	<div class="container">
		<div class="row">

            {!!Form::model($event, ['method' => 'PATCH', 'url' => url('eventi/'.$event->id), 'class' => ''])!!}

                @include('pages.events.form',  ['submitButtonText' => 'Modifica Evento'])

            {!! Form::close() !!}

		</div>
	</div>
@stop