@extends('layouts.app')

@section('meta')
<title>Modifica il Tuo Profilo</title>
@stop

@section('title')
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Modifica Profilo</h1>
                    <h2 class="hs-line-4 font-alt">Rivedi e cambia i tuoi dati</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <a href="{{url('profilo/'.$profile->id)}}">Profilo</a>&nbsp;/&nbsp;
                        <span>Modifica Profilo</span>
                    </div>  
                </div>
            </div>
        </div>
    </section>
@stop

@section('content')
    <div class="row">
        
        <div class="col-sm-8 col-sm-offset-2">
            {!!Form::model($profile, ['method' => 'PATCH',  'url' => url('profilo/'.$profile->id)])!!}
                @include('pages.profiles.form',  ['submitButtonText' => 'Modifica Profilo'])
            {!! Form::close() !!}
        </div>

    </div>

@stop