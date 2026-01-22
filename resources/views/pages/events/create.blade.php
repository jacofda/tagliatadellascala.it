@extends('layouts.admin')

@section('title') Crea Un Evento @stop

@section('content')
    {!!Form::open(['url' => url('eventi')])!!}
        @include('pages.events.form',  ['submitButtonText' => 'Crea Evento'])
    {!! Form::close() !!}
@stop