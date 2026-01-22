<nav class="main-nav dark transparent stick-fixed">
    <div class="full-wrapper relative clearfix">
        <div class="nav-logo-wrap local-scroll">
            <a href="{{url('/')}}" class="logo">
                <img src="{{asset('img/logo.png')}}" alt="logo associazione tagliata della scala" />
            </a>
        </div>
        <div class="mobile-nav">
            <i class="fa fa-bars"></i>
        </div>
        <div class="inner-nav desktop-nav">
            <ul class="clearlist"> 

                @role('admin')
                    <li><a href="{{url('home')}}">Admin</a></li>  
                @endrole
                <li>
                    <a href="#" class="mn-has-sub">Associazione <i class="fa fa-angle-down"></i></a>   
                    <ul class="mn-sub">
                        <li><a href="{{url('associazione/chi-siamo')}}" title="la storia della scala dei sapori">Chi Siamo</a></li>
                        <li><a href="{{url('gallerie/associazione')}}" title="galleria immagini scala dei sapori">Gallerie / Foto</a></li>
                        <li><a href="{{url('articoli/associazione')}}" title="news e articolo associazione tagliata della scala">News / Articoli</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="mn-has-sub">Scala dei Sapori <i class="fa fa-angle-down"></i></a>   
                    <ul class="mn-sub">
                        <li><a href="{{url('scala-dei-sapori/la-storia')}}" title="la storia della scala dei sapori">La Storia</a></li>   
                        <li><a href="{{url('scala-dei-sapori/diventa-espositore')}}" title="come diventare espositore">Diventa Espositore</a></li>
                        <li><a href="{{url('gallerie/scala-dei-sapori')}}" title="galleria immagini scala dei sapori">Gallerie / Foto</a></li>
                        <li><a href="{{url('scala-dei-sapori/stands')}}" title="stand scala dei sapori">Stands</a></li>
                        <li><a href="{{url('scala-dei-sapori/edizione-2019')}}" title="edizione 2019">Edizione 2019</a></li>
                    </ul>
                </li>
                <li><a href="{{url('eventi')}}" title="eventi associazione tagliata della scala">Eventi</a></li>
                <li><a href="{{url('video')}}" title="video associazione tagliata della scala">Video</a></li>                      
                <li><a href="{{url('contatti')}}" title="contatti associazione tagliata della scala">Contatti</a></li>
                @if (Auth::guest())
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('login') }}"><i class="fa fa-lock"></i> &nbsp;Login</a></li>
                @else
                    <li>
                        <a href="#" class="mn-has-sub">&nbsp;&nbsp;&nbsp;&nbsp;{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></a>
                        <ul class="mn-sub">
                            @if(Auth::user()->profile()->exists())
                                <li><a href="{{url('profilo/'.Auth::user()->profile->id)}}">Dati Profilo</a></li>
                            @else
                                <li><a href="{{url('profilo/create')}}">Crea Profilo</a></li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>                                                    
        </div>
    </div>
</nav>