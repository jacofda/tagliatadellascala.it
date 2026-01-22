@extends('layouts.admin')

@section('title') Modifica {{$article->name}} @stop

@section('content')
	<div class="container">
		<div class="row">

            {!!Form::model($article, ['method' => 'PATCH', 'url' => url('articoli/'.$article->id)])!!}

                @include('pages.articles.form',  ['submitButtonText' => 'Modifica Articolo'])

            {!! Form::close() !!}

		</div>
	</div>
@stop