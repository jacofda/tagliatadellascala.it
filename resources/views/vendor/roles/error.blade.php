@extends('layouts.app')

@section('title')
    <title>
    @if( strpos($exception->getMessage(), "admin") !== false )
        AREA RISERVATA
    @else
        ERRORE
    @endif
    </title>
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <small>{{ config('app.name') }}</small>

				<h3 class="font-alt mb-30 mb-xxs-10">
                    @if( strpos($exception->getMessage(), "admin") !== false )
                        <b>AREA RISERVATA</b><br>
                        NON HAI LE CREDENZIALI PER ENTRARE IN QUESTA PAGINA
                    @else
                        {{ $exception->getMessage() }}
                    @endif
                </h3>
                <a href="{{ url('/') }}" class="btn btn-mod btn-medium btn-round mb-xs-10">home</a>
                @if( strpos($exception->getMessage(), "admin") !== false )
                 <a href="{{ url('login') }}" class="btn btn-mod btn-medium btn-round mb-xs-10">login</a>
                @endif
            </div>
        </div>
    </div>

@endsection