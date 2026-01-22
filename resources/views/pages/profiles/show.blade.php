@extends('layouts.app')

@section('meta')
<title>Tuo Profilo {{$profile->name}}</title>
@stop

@section('title')
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Tuo Profilo</h1>
                    <h2 class="hs-line-4 font-alt">Vedi i tuoi acquisti / modifica dati</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <span>Il mio Profilo</span>
                    </div>  
                </div>
            </div>
        </div>
    </section>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <h5 class="widget-title font-alt">I tuoi dati</h5>
            <div class="widget-body">
                <ul class="clearlist widget-menu">
                    <li><a href="#">Nome: </a><small> {{$profile->nome}}</small></li>
                    <li><a href="#">Cognome: </a><small> {{$profile->cognome}}</small></li>
                    <li><a href="#">Email: </a><small> {{$profile->email}}</small></li>
                    <li><a href="#">Telefono: </a><small> {{$profile->telefono}}</small></li>
                </ul>
                <br><br>

                <div class="tags">
                    <a href="{{url('profilo/'.$profile->id.'/edit')}}" title="per l'acquisto dei biglietti">Modifica dati Profilo</a>
                    <a href="{{url('user/'.Auth::user()->id.'/edit')}}" title="per il login">Modifica dati Account</a>
                </div>

            </div>
        </div>
        <div class="col-sm-7 col-sm-offset-1">
            <h5 class="widget-title font-alt">I tuoi biglietti</h5>
            <div class="widget-body">
                @forelse(\Auth::user()->tickets()->orderBy('created_at', 'DESC')->get() as $ticket)
                {{-- @forelse(App\User::find(10)->tickets()->orderBy('created_at', 'DESC')->get() as $ticket) --}}
                    <div class="ticket-wrapper">
                        <div class="top-left">{{$loop->iteration}})</div>
                        <div class="top-right"><a class="btn btn-round btn-mod white-bg" href="{{asset('storage/tickets/'.$ticket->media()->latest()->first()->filename)}}" target="_blank"><i class="fa fa-download"></i>SCARICA BIGLIETTO</a></div>
                        <p><b>Acquistato il </b>: {{$ticket->created_at->format('d/m/Y')}}</p>
                        <p><b>Evento </b>: {{\App\Event::find($ticket->event_id)->name}}</p>
                        <p><b>Totale Pagato</b>: {{$ticket->total}} €</p>
                        <p><b>Valido per</b>: {{$ticket->valid_for}}</p>
                        <p><b>Codice</b>: {{$ticket->code}}</p>
                    </div>
                @empty
                    <div class="ticket-wrapper">
                        <a class="btn btn-round btn-mod white-bg" href="{{url('eventi')}}"> Vedi i Prossimi Eventi</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@stop