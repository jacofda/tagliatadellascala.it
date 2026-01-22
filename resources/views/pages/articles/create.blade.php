@extends('layouts.admin')

@section('title') Crea Un Articolo @stop

@section('content')
    {!!Form::open(['url' => url('articoli')])!!}
        @include('pages.articles.form',  ['submitButtonText' => 'Crea Articolo'])
    {!! Form::close() !!}
@stop