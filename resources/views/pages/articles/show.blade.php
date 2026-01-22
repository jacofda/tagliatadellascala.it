@extends('layouts.app')

@section('meta')
<title>{{$article->name}} | {{$article->sectors()->first()->name}}</title>
<meta name="description" content="{{$article->centocinquanta}}" />

<meta property="og:type" content="article" />
<meta property="og:url" content="{{$article->url}}" />
<meta property="og:title" content="{{$article->name}} | {{$article->sectors()->first()->name}}" />
<meta property="og:description" content="{{$article->centocinquanta}}" />
@if($article->has_image)
	<meta property="og:image" content="{{asset('storage/articles/full/'.$article->media()->where('mime','image')->first()->filename)}}" />
@endif
@stop

@section('title')
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{$article->name}}</h1>
                    <h2 class="hs-line-4 font-alt">{{$article->tags()->first()->name}} 
                    @role('admin') 
                    	<a class="btn btn-mod btn-gray btn-round" href="{{url('articoli/'.$article->id.'/edit')}}">Modifica</a> 
                    	<a class="btn btn-mod btn-gray btn-round" href="{{url('admin/articoli/'.$article->id.'/media')}}">Media</a> 
                    @endrole 
                    </h2>

                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <a href="{{url($article->sectors()->first()->slug)}}">{{$article->sectors()->first()->name}}</a>&nbsp;/&nbsp;
                        <span>{{$article->name}}</span>
                    </div>  
                </div>
            </div>
        </div>
    </section>
@stop


@section('content')

	<div class="col-sm-8">
	                            
	    <div class="blog-item mb-80 mb-xs-40">
	        
			<div class="blog-item-body">
	            <h1 class="mt-0 font-alt">{{$article->name}}</h1>

	            <div class="blog-media mt-40 mb-40 mb-xs-30">
	                <ul class="clearlist content-slider">
	                	@if($article->has_image)
	                		@foreach($article->media()->where('mime','image')->get() as $image)
		                   		<li><img src="{{asset('storage/articles/display/'.$image->filename)}}" alt="{{$image->description}}" /></li>
							@endforeach
		                @endif
	                </ul>
	            </div>
				
				<div class="clearfix"></div>


				<p class="mt-30">{!! $article->description !!}</p>
	            
	            <div class="clearfix"></div>
	            
	                	@if($article->media()->where('mime','!=','image')->exists())
	                		@foreach($article->media()->where('mime','!=','image')->get() as $file)
		                   		<a class="btn btn-mod" target="_BLANK" href="{{asset('storage/articles/original/'.$file->filename)}}">{{$file->description}}</a>
							@endforeach
		                @endif

			</div>
			
		</div>

	</div>

	<div class="col-sm-4">
		@include('elements.sidebar')
	</div>



@stop