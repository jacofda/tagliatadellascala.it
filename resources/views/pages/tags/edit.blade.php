@extends('layouts.admin')

@section('title') Modifica Tag:     {{$tag->name}} @stop

@section('content')
    <div class="container">
        <div class="row">

            {!!Form::model($tag, ['method' => 'PATCH', 'url' => url('tags/'.$tag->id), 'class' => ''])!!}

                @include('pages.tags.form',  ['submitButtonText' => 'Modifica Tag'])

            {!! Form::close() !!}

        </div>
    </div>
@stop