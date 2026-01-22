@extends('layouts.app')

@section('meta')
<title>Contenuti con tag: {{$tag->name}} | Tagliata della Scala Primolano</title>

    <meta name="description" content="Contenuti con tag: {{$tag->name}} | Tagliata della Scala Primolano e Scala dei Sapori" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{url('tags/'.$tag->slug)}}" />
    <meta property="og:title" content="Contenuti con tag: {{$tag->name}} | Tagliata della Scala Primolano" />
    <meta property="og:description" content="Contenuti con tag: {{$tag->name}} | Tagliata della Scala Primolano" />

@stop

@section('title')
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{$tag->name}}</h1>
                    <h2 class="hs-line-4 font-alt">Associazione Tagliata della Scala | Scala dei Sapori</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <span>{{$tag->name}}</span>
                    </div>  
                </div>
            </div>
        </div>
    </section>
@stop

@section('content')
    <div class="col-sm-8">
        

        <div class="row multi-columns-row">
    
            @foreach($collection as $content)

                <div class="col-md-6 col-lg-6 mb-60 mb-xs-40">

                    @if($content->has_image)
                        <div class="post-prev-img">
                            <a href="{{$content->url}}"><img src="{{$content->image}}" alt="{{$content->name}}" /></a>
                        </div>
                    @endif

                    <div class="post-prev-title font-alt">
                        <a href="{{$content->url}}">
                            @if( strpos($content->tags()->first()->slug, '-sapori') !== false)
                                <b>Stand</b>
                            @else
                                <b>{{$content->class}}</b>
                            @endif
                            - {{$content->name}}
                        </a>
                    </div>

                    <div class="blog-item-data">
                        <i class="fa fa-clock-o"></i> {{$content->created_at->format('d/m/Y')}}
                        <span class="separator">&nbsp;</span>
                        <i class="fa fa-folder-open"></i>
                        @foreach($content->tags as $value)
                            @if ($loop->last)
                                @if($value->id != $tag->id)
                                    <a href="{{url('tags/'.$value->slug)}}">{{$value->name}}</a>
                                @endif
                            @else
                                @if($value->id != $tag->id)
                                    <a href="{{url('tags/'.$value->slug)}}">{{$value->name}}</a>
                                @endif
                            @endif  
                        @endforeach
                    </div>

                    <div class="blog-item-body">
                        <p>{{$content->centocinquanta}}</p>
                    </div>
                </div>

            @endforeach
        </div>


    </div>
    <div class="col-sm-4">
        @include('elements.sidebar')
    </div>
@stop