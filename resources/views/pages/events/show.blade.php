@extends('layouts.app')

@section('meta')
<title>{{$event->name}}: {{$event->location}} | {{config('app.name')}}</title>
<meta name="description" content="{{ $event->centocinquanta }}">
<link rel="canonical" href="{{$event->url}}" />
<meta property="og:title" content="{{$event->name}}">
<meta property="og:description" content="@if($event->price) BIGLIETTI ONLINE! @endif {{ $event->centocinquanta }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{$event->url}}">
<meta property="og:image" content="{{$event->image_full}}">
<meta property="og:image:alt" content="{{$event->name}}">

<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Event",
  "name": "{{$event->name}}",
  "url": "{{$event->url}}",
  "image": "{{$event->image}}",
  "sponsor": {
    "@type": "Organization",
    "name": "Associazione Tagliata Della Scala",
    "url": "{{url('/')}}"
        },
  "startDate": "{{$event->start->format('d-m-Y H:i')}}",
  "endDate": "{{$event->finish->format('d-m-Y H:i')}}",
  "description": "{!! $event->centocinquanta !!}",
  "location": {
    "@type": "Place",
    "name": "Vicenza",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "{{$event->location}}",
      "addressRegion": "Vicenza",
      "addressCountry": "Italy"
      }
    }
    @if($event->price)
  ,
  "offers": {
    "@type": "Offer",
    "availability": "http://schema.org/InStock",
    "url": "{{$event->url}}",
    "price": "{{$event->no_currency_price}}",
    "priceCurrency": "EUR",
    "validFrom": "{{$event->created_at->format('c')}}"
  },
  "performer": {
  		"@type": "PerformingGroup",
  		"name": "Associazione Tagliata Della Scala"
   }
  @endif
}
</script>

@stop

@section('title')
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{$event->name}}</h1>
                    <h2 class="hs-line-4 font-alt">{{$event->location}} - {{$event->start->format('d/m/Y H:i')}} @role('admin') <a class="btn btn-mod btn-gray btn-round" href="{{url('eventi/'.$event->id.'/edit')}}">Modifica</a> @endrole </h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <a href="{{url('eventi')}}">Eventi</a>&nbsp;/&nbsp;
                        <a href="{{url('associazione')}}">Ass. Tagliata Della Scala</a>&nbsp;/&nbsp;
                        <span>{{$event->name}}</span>
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
	            <h3 class="mt-0 font-alt">{{$event->name}} | {{$event->start->format('d/m/Y H:i')}}</h3>

	            <div class="blog-media mt-40 mb-40 mb-xs-30">
	                <ul class="clearlist content-slider">
	                	@if($event->has_image)
	                		@foreach($event->media()->where('mime','image')->orderBy('created_at', 'ASC')->get() as $image)
		                   		<li><img src="{{asset('storage/events/display/'.$image->filename)}}" alt="{{$image->description}}" /></li>
							@endforeach
		                @endif
	                </ul>
	            </div>

				<div class="col-sm-6">
					<h4 class="mb-0 mt-0"><u>Dove:</u> <b>{{$event->location}}</b></h4>
					@if ( $event->price )
						<h4 class="mb-0 mt-0"><u>Costo:</u> <b>{{$event->formatted_price}}</b></h4>
						@if ( $event->price_reduced )
							<h4 class="mb-0 mt-0"><u>Ridotto:</u> <b>{{$event->formatted_price_reduced}}</b></h4>
						@endif
						@if ( $event->ticket_availability )
							<h4 class="mb-0 mt-0"><u>Biglietti Disponibili:</u> <b>{{$event->ticket_availability}}</b></h4>
						@endif
					@endif
					<h4 class="mt-0"><u>Quando:</u> <b>{{$event->start->formatLocalized("%A %d %B %Y")}}</b></h4>
				</div>
				@if ( $event->price )
					<div class="col-sm-6">
	                	@if ( \Carbon\Carbon::now()->diffInDays($event->start) > 2 )
			                <div class="blog-item-foot mt-10">
			                	{!!Form::open(['url' => url('eventi/biglietti')]) !!}
			                		<input type="hidden" name="id" value={{$event->id}}>
			                		<button class="btn btn-mod btn-round btn-large" type="submit">Prenota Biglietti <i class="fa fa-ticket"></i></button>
{{-- <h4 style="color:red;">STIAMO AGGIORNANDO IL SISTEMA DI PAGAMENTO. I BIGLIETTI ONLINE TORNERANNO ATTIVI FRA ALCUNE ORE.</h4> --}}
			                	{!!Form::close()!!}
			                </div>
			            @else
			            	<div class="blog-item-foot mt-10">
			            		<p class="lead">Prevendita chiusa</p>
			            	</div>
			            @endif
					</div>
				@endif

				<div class="clearfix"></div>


				<p class="mt-30">{!! $event->description !!}</p>

				@if($event->media()->where('mime', 'doc')->exists())
				<div class="clearfix"></div>
				<div class="center">
					@foreach($event->media()->where('mime', 'doc')->get() as $file)
						<a target="_BLANK" href="{{asset('storage/events/original/'.$file->filename)}}" class="btn btn-mod btn-border btn-round btn-medium">{{ $file->description }}</a>
					@endforeach

				</div>
				@endif


			</div>

		</div>

	</div>

	<div class="col-sm-4">
		@include('elements.sidebar')
	</div>



@stop
