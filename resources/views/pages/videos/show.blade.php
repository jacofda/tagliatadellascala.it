@extends('layouts.app')

@section('meta')
<title>{{$video->name}} | {{$sector->name}}</title>
<meta name="description" content="{{$video->centocinquanta}}" />
<link rel="canonical" href="{{$video->url}}" />
@stop


@section('title')

	<section class="small-section bg-dark-alfa-90">
	    <div class="relative container align-left">

	        <div class="row">

	            <div class="col-md-8">
	                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{$video->name}}</h1>
	                <h2 class="hs-line-4 font-alt">Video {{$sector->name}} </h2>
	            </div>

	            <div class="col-md-4 mt-30">
	                <div class="mod-breadcrumbs font-alt align-right">
	                    <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <a href="{{url('video')}}">Video</a>&nbsp;/&nbsp;
	                    <span>{{$video->name}}</span>
	                </div>
	            </div>
	        </div>

	    </div>
	</section>

@stop


@section('content')

    <div class="col-sm-8">

		<div class="blog-item">
            <h3 class="blog-item-title font-alt">{{$video->name}}</h3>
            <div class="blog-item-data">
                <i class="fa fa-clock-o"></i> {{$video->created_at->format('d/m/Y')}}
                <span class="separator">&nbsp;</span>
                <i class="fa fa-user"></i> {{$sector->name}}
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
                    {!!$video->centocinquanta!!}
                </p>
            </div>
        </div>

    </div>

    <div class="col-sm-4">
    	@include('elements.sidebar')
    </div>


@stop
