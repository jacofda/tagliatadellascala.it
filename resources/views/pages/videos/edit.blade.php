@extends('layouts.admin')

@section('title') Modifica Video:     {{$video->name}} @stop

@section('content')
    <div class="container">
        <div class="row">

            {!!Form::model($video, ['method' => 'PATCH', 'url' => url('video/'.$video->id), 'class' => ''])!!}

                @include('pages.videos.form',  ['submitButtonText' => 'Modifica Video'])

            {!! Form::close() !!}

        </div>
    </div>
@stop