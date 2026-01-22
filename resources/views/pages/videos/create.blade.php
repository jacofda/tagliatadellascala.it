@extends('layouts.admin')

@section('title')Crea Una nuovo Video @stop

@section('content')
    {!!Form::open(['url' => url('video')])!!}
        @include('pages.videos.form',  ['submitButtonText' => 'Crea Video'])
    {!! Form::close() !!}
@stop