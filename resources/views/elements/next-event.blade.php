@if($event)
    <section class="page-section">
        <div class="container relative">
            <div class="row">
                <h3 class="uppercase mb-40 pl-15">Prossimo Evento | {{$event->start->formatLocalized("%a %d %B %Y")}}</h3>
                <div class="col-md-7 mb-sm-40">

                    <div class="work-full-media mt-0 white-shadow">
                        <ul class="clearlist work-full-slider owl-carousel">
                            @foreach($event->media()->where('mime','image')->orderBy('created_at', 'ASC')->get() as $image)
                                <li>
                                    <a href="{{$event->url}}">
                                        <img src="{{asset('storage/events/display/'.$image->filename)}}" alt="{{$image->description}}" />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

                <div class="col-md-5 col-lg-4 col-lg-offset-1">

                    <div class="text">
                        <h3 class="font-alt mb-30 mb-xxs-10">{{$event->name}}</h3>
                        @if($event->price)
                            <div class="mt-10">
                                <a href="{{$event->url}}" class="btn btn-mod btn-border btn-round btn-medium" >Vedi dettagli e Biglietti</a>
                                {{-- <a href="https://www.tagliatadellascala.it/scala-dei-sapori/stands/scala-dei-sapori-2019" class="btn btn-mod btn-border btn-round btn-medium mt-20" >Vedi Stands 2019</a> --}}
                            </div>
                        @else
                            <div class="mt-40">
                                <a href="{{$event->url}}" class="btn btn-mod btn-border btn-round btn-medium" >Vedi dettagli</a>
                            </div>
                        @endif



                    </div>

                </div>
            </div>
        </div>
    </section>
@endif
