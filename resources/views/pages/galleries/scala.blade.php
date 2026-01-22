@extends('layouts.app')

@section('meta')
<title>Tutte le foto delle edizioni della Scala Dei Sapori</title>

    <meta name="description" content="Tutte le foto delle edizioni della Scala Dei Sapori" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{url('gallerie/scala-dei-sapori')}}" />
    <meta property="og:title" content="Foto | Scala Dei Sapori" />
    <meta property="og:description" content="Tutte le foto delle edizioni della Scala Dei Sapori" />
    <meta property="og:image" content="{{ \App\Sector::find(1)->galleries()->latest()->first()->image_full }}" />
    <meta property="og:image:type" content="image/jpeg" />

@stop

@section('title')
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Foto E Gallerie</h1>
                    <h2 class="hs-line-4 font-alt">Tutte le foto delle edizioni della Scala Dei Sapori</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <a href="{{url('scala-dei-sapori/la-storia')}}">Scala dei Sapori</a>&nbsp;/&nbsp;
                        <span>Gallerie</span>
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
                @foreach($galleries as $gallery)
                    <div class="col-md-6 col-lg-6 mb-60 mb-xs-40">
                        <div class="post-prev-img">
                            <a href="{{$gallery->url}}">
                                <img src="{{asset('storage/galleries/display/'.$gallery->media()->first()->filename)}}" alt="{{$gallery->name}}" />
                            </a>
                        </div>
                        
                        <div class="post-prev-title font-alt">
                            <a href="{{$gallery->url}}">{{$gallery->name}}</a>
                        </div>
                        
                        <div class="post-prev-info font-alt">
                            <a href="{{url('tags/'.$gallery->tags()->first()->slug)}}">{{$gallery->tags()->first()->name}}</a> | {{$gallery->created_at->format('m/Y')}}
                        </div>
                        
                        <div class="post-prev-text">
                            {{$gallery->centocinquanta}} 
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