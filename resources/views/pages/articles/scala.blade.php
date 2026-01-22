@extends('layouts.app')

@section('meta')
<title>Stand Scala dei Sapori di Primolano</title>
<meta name="description" content="Gli stand e gli espositori delle edizioni della Scala dei Sapori di Primolano" />
@stop

@section('title')
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Stands</h1>
                    <h2 class="hs-line-4 font-alt">Scala dei Sapori </h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <a href="{{url('scala-dei-sapori')}}">Scala dei Sapori</a>&nbsp;/&nbsp;
                        <span>Stands</span>
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
                                    <img src="{{asset('storage/articles/display/'.$article->media()->first()->filename)}}" alt="{{$article->name}}" />
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

            <div class="row">
                <div class="text-center">
                    {{ $articles->links() }}
                </div>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="widget mt-30">
                <h5 class="widget-title font-alt">Filtra le edizioni</h5>
                <div class="widget-body">
                    <div class="tags">
                        @foreach(range(2015,date('Y')) as $year)
                            <a href="{{url('scala-dei-sapori/stands/scala-dei-sapori-'.$year)}}">Edizione {{$year}}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="widget mt-30">
                <h5 class="widget-title font-alt">Info Utili</h5>
                <div class="widget-body">
                    <div class="tags">
                        <a href="{{url('scala-dei-sapori/diventa-espositore')}}">Diventa Espositore</a>
                    </div>
                </div>
            </div>

            @include('elements.sidebar')


        </div>

    </div>

@stop