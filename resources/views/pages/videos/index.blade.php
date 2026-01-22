@extends('layouts.app')

@section('meta')
<title>Video degli eventi: Scala dei Sapori e Forte Tagliata</title>

<meta name="description" content="Video degli eventi, concerti, spettacoli e feste: Scala dei Sapori e Associazione Tagliata della Scala" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{url('video')}}" />
<meta property="og:title" content="Video degli eventi: Scala dei Sapori e Forte Tagliata" />
<meta property="og:description" content="Video degli eventi, spettacoli, concerti e feste: Scala dei Sapori e Forte Tagliata" />
<meta property="og:image" content="{{ \App\Event::latest()->first()->image_full }}" />
<meta property="og:image:type" content="image/jpeg" />

@stop

@section('title')

	<section class="small-section bg-dark-alfa-90">
	    <div class="relative container align-left">
	        
	        <div class="row">
	            
	            <div class="col-md-8">
	                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Video</h1>
	                <h2 class="hs-line-4 font-alt">Alcuni momenti dei nostri eventi significativi </h2>
	            </div>
	            
	            <div class="col-md-4 mt-30">
	                <div class="mod-breadcrumbs font-alt align-right">
	                    <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
	                    <span>Video</span>
	                </div>
	            </div>
	        </div>
	        
	    </div>
	</section>

@stop

@section('content')

    <div class="col-sm-8">
		@foreach($videos as $video)
			<div class="blog-item">
                <h2 class="blog-item-title font-alt"><a href="{{$video->url}}">{{$video->name}}</a></h2>
                <div class="blog-item-data">
                    <i class="fa fa-clock-o"></i> {{$video->created_at->format('d/m/Y')}}
                    <span class="separator">&nbsp;</span>
                    <i class="fa fa-user"></i> {{$video->sectors()->first()->name}}
                    <span class="separator">&nbsp;</span>
                    <i class="fa fa-folder-open"></i>
                    @foreach($video->tags as $tag)
                        @if ($loop->last)
                        	<a href="{{url('tags/'.$tag->slug)}}">{{$tag->name}}</a>
						@else
							<a href="{{url('tags/'.$tag->slug)}}">{{$tag->name}}</a>,
						@endif 	
                    @endforeach
                </div>
                <div class="blog-media">
                    <iframe width="640" height="360" src="{{$video->embed}}" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="blog-item-body">
                    <p>
                        {{$video->centocinquanta}}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="col-sm-4">
    	@include('elements.sidebar')
    </div>


@stop