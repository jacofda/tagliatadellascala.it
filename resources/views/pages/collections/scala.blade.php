@extends('layouts.app')

@section('meta')
<title>Scala dei Sapori | News / Gallerie / Foto / Eventi</title>
<meta name="description" content="Tutti i contenuti riguardanti la Scala dei Sapori di Primolano" />
@stop

@section('title')
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Scala dei Sapori</h1>
                    <h2 class="hs-line-4 font-alt">News / Gallerie / Foto / Eventi Tagliata della scala</h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <a href="{{url('scala-dei-sapori')}}">Scala dei Sapori</a>
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
                        @foreach($content->tags as $tag)
                            @if ($loop->last)
                                <a href="{{url('tags/'.$tag->slug)}}">{{$tag->name}}</a>
                            @else
                                <a href="{{url('tags/'.$tag->slug)}}">{{$tag->name}}</a>,
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