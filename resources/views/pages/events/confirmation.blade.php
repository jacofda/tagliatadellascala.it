@extends('layouts.app')

@section('meta')
<title>Conferma </title>
@stop



@section('title')

    <section class="small-section bg-dark-alfa-90">
        <div class="relative container align-left">
            
            <div class="row">
                
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Confermato</h1>
                    <h2 class="hs-line-4 font-alt">Pagamento è andato a buon fine</h2>
                </div>
                
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <a href="{{url('eventi')}}">Eventi</a>&nbsp;/&nbsp;
                        <a href="{{$event->url}}">{{$event->name}}</a>&nbsp;/&nbsp;
                        <span>Confermato</span>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

@endsection

@section('content')



        <div class="widget col-md-6 mt-60">
            <div class="text-center center mb-20">
            <a class="btn btn-round btn-mod btn-large white-bg" href="{{asset('storage/tickets/'.$ticket->media()->latest()->first()->filename)}}" target="_BLANK" >
                <i class="fa fa-download"></i> Scarica biglietto</a>
            </div>
                <p>Puoi scaricare il biglietto ora o più tardi direttamente dal tuo profilo (<a href="{{url('profilo/'.$profile->id)}}">Profilo {{$profile->nome}}</a>)</p>

        </div>
        

        <div class="widget col-md-5 col-md-offset-1">
                       
            <div class="widget-body">
                <div class="clearfix col-sm-12 text text-center">
                    <div class="align-right">
                        <img class="max-300" src={{asset('storage/events/display/'.$event->media()->where('mime','image')->first()->filename)}} alt="{{$event->name}}" />
                    </div>                             
                </div>
               
            </div>
            
        </div>

@endsection

