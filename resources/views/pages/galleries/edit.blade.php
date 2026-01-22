@extends('layouts.admin')

@section('title') Modifica {{$gallery->name}} @stop

@section('content')
	<div class="container">
		<div class="row">

            {!!Form::model($gallery, ['method' => 'PATCH', 'url' => url('gallerie/'.$gallery->id)])!!}

                @include('pages.galleries.form',  ['submitButtonText' => 'Modifica Galleria'])

            {!! Form::close() !!}

		</div>
	</div>
@stop