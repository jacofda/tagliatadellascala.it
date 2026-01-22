@extends('layouts.admin')

@section('title') Crea Una Galleria di Immagini @stop

@section('content')
    {!!Form::open(['url' => url('gallerie')])!!}
        @include('pages.galleries.form',  ['submitButtonText' => 'Crea Galleria'])
    {!! Form::close() !!}
@stop