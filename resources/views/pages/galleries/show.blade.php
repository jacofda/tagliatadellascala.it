@extends('layouts.app')

@section('meta')
<title>{{$gallery->name}} | {{$gallery->sectors()->first()->name}}</title>
<meta name="description" content="{{$gallery->centocinquanta}}" />
@stop

@section('title')
    <section class="page-section bg-dark-alfa-90">
        <div class="relative container align-left"> 
            <div class="row"> 
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Galleria</h1>
                    <h2 class="hs-line-4 font-alt">{{$gallery->name}} @role('admin') <a class="btn btn-mod btn-gray btn-round" href="{{url('gallerie/'.$gallery->id.'/edit')}}">Modifica</a> @endrole </h2>
                </div>
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="{{url('/')}}">Home</a>&nbsp;/&nbsp;
                        <a href="{{url($gallery->sectors()->first()->slug)}}">{{$gallery->sectors()->first()->name}}</a>&nbsp;/&nbsp;
                        <a href="{{url('gallerie/'.$gallery->sectors()->first()->slug)}}">Gallerie</a>&nbsp;/&nbsp;
                        <span>{{$gallery->name}}</span>
                    </div>  
                </div>
            </div>
        </div>
    </section>
@stop

@section('full-content')
<section class="page-section pb-0">
    <div class="relative">
        <div class="container">
            <div class="works-filter align-center">
                {!!$gallery->description!!}
            </div>
        
        <ul class="works-grid work-grid-3 clearfix font-alt hover-white hide-titles masonry" id="work-grid">
            
            @foreach($gallery->media as $image)              
                <li class="work-item mix">
                    <a href="{{asset('storage/galleries/full/'.$image->filename)}}" class="work-lightbox-link mfp-image">
                        <div class="work-img">
                            <img src="{{asset('storage/galleries/display/'.$image->filename)}}" alt="{{$image->description}}" />
                        </div>
                        <div class="work-intro">
                            <h3 class="work-title">{{$gallery->name}}</h3>
                            <div class="work-descr">
                                {{$image->description}}
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        </div>
    </div>
</section>

@stop