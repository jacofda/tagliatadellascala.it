@extends('layouts.app')

@section('meta')
<title>Notizie dell'Associazione Tagliata Della Scala - Primolano</title>
<meta name="description" content="Notizie e Approfondimenti dell'Associazione Tagliata Della Scala di Primolano" />
@stop

@section('title')
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Notizie</h1>
                    <h2 class="hs-line-4 font-alt">Associazione Tagliata Della Scala</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <a href="{{url('associazione/chi-siamo')}}">Ass. Tagliata Della Scala</a>&nbsp;/&nbsp;
                        <span>Notizie</span>
                    </div>  
                </div>
            </div>
        </div>
    </section>
@stop

@section('content')
    <div class="row">
        
        <div class="col-sm-8">
            
            <div class="row multi-columns-row">
                @foreach($articles as $article)
                    <div class="col-md-6 col-lg-6 mb-60 mb-xs-40">
                        @if($article->media()->where('mime', 'image')->exists() )
                            <div class="post-prev-img">
                                <a href="{{$article->url}}">
                                    <img src="{{asset('storage/app/articles/display/'.$article->media()->first()->filename)}}" alt="{{$article->name}}" />
                                </a>
                            </div>
                        @endif
                        <div class="post-prev-title font-alt">
                            <a href="{{$article->url}}">{{$article->name}}</a>
                        </div>
                        
                        <div class="post-prev-info font-alt">
                            <a href="{{url('tags/'.$article->tags()->first()->slug)}}">{{$article->tags()->first()->name}}</a> | {{$article->created_at->format('m/Y')}}
                        </div>
                        
                        <div class="post-prev-text">
                            {{$article->centocinquanta}} 
                        </div>
                        
                    </div>
                @endforeach
            </div>

        </div>
        <div class="col-sm-4">
            @include('elements.sidebar')
        </div>

    </div>

@stop