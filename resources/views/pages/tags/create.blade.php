@extends('layouts.admin')

@section('title') Crea Una nuova Tag @stop

@section('content')
    {!!Form::open(['url' => url('tags')])!!}
        @include('pages.tags.form',  ['submitButtonText' => 'Crea Tag'])
    {!! Form::close() !!}
@stop