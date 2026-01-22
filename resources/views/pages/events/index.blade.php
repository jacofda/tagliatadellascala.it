@extends('layouts.app')

@section('meta')
<title>Eventi Scale di Primolano Forte Tagliata</title>
<meta name="description" content="Eventi promossi dall'associazione tagliata della scala di primolano. Scala dei Sapori e Concerti Forte Tagliata" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{url('eventi')}}" />
<meta property="og:title" content="Eventi Associazione Tagliata di Primolano" />
<meta property="og:description" content="Tutti gli eventi promossi dall'associazione tagliata della scala di primolano. Concerti, spettacoli ed eventi nelle fortificazioni delle scale di Primolano." />
<meta property="og:image" content="{{ \App\Event::latest()->first()->image_full }}" />
<meta property="og:image:type" content="image/jpeg" />

@stop

@section('title')

	<section class="small-section bg-dark-alfa-90">
	    <div class="relative container align-left">

	        <div class="row">

	            <div class="col-md-8">
	                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Eventi</h1>
	                <h2 class="hs-line-4 font-alt">Concerti, Serate, Escursioni ... </h2>
	            </div>

	            <div class="col-md-4 mt-30">
	                <div class="mod-breadcrumbs font-alt align-right">
	                    <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;<span>Eventi</span>
	                </div>
	            </div>
	        </div>

	    </div>
	</section>

@stop


@section('content')

	<div class="col-md-8">

		@foreach($events as $event)

            <div class="blog-item">
                <h2 class="blog-item-title font-alt"><a href="{{$event->url}}">{{$event->name}}</a></h2>
                <div class="blog-item-data">
                    <i class="fa fa-clock-o"></i> {{$event->created_at->format('d/m/Y')}}
                    <span class="separator">&nbsp;</span>
                    <i class="fa fa-user"></i> {{$event->sectors()->first()->name}}
                    <span class="separator">&nbsp;</span>
                    <i class="fa fa-folder-open"></i>
                    @foreach($event->tags as $tag)
                        @if ($loop->last)
                        	<a href="{{url('tags/'.$tag->slug)}}">{{$tag->name}}</a>
						@else
							<a href="{{url('tags/'.$tag->slug)}}">{{$tag->name}}</a>,
						@endif
                    @endforeach
                    <span class="separator">&nbsp;</span>
                    <i class="fa fa-calendar"></i> {{$event->start->formatLocalized('%A %d %B %Y')}}
                </div>

                <!-- Media Gallery -->
                <div class="blog-media">
                    <ul class="clearlist content-slider">
                    	@foreach($event->media()->where('mime','image')->get() as $image)
                            <li><img src="{{asset('storage/events/display/'.$image->filename)}}" alt="{{$image->description}}" /></li>
                        @endforeach
                    </ul>
                </div>
                <div class="blog-item-body">
                    <p>
                        {{$event->centocinquanta}}
                    </p>
                </div>

                @if ( $event->price )
                	@if ( \Carbon\Carbon::now()->diffInDays($event->start) > 0 )
		                <div class="blog-item-foot">
		                	{!!Form::open(['url' => url('eventi/biglietti')]) !!}
		                		<input type="hidden" name="id" value={{$event->id}}>
		                		<button class="btn btn-mod btn-round btn-large" type="submit">Prenota Biglietti <i class="fa fa-ticket"></i></button>
{{-- <h4 style="color:red;">STIAMO AGGIORNANDO IL SISTEMA DI PAGAMENTO. I BIGLIETTI ONLINE TORNERANNO ATTIVI FRA ALCUNE ORE.</h4> --}}

		                	{!!Form::close()!!}
		                </div>
		            @endif
	            @endif

            </div>

		@endforeach

	</div>

	<div class="col-md-4">
		@include('elements.sidebar')
	</div>

@stop
