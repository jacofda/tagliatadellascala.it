<nav class="navbar navbar-default navbar-static-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}">Torna al sito</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a href="{{url('home')}}">Dashboard</a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Articoli <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('articoli/create')}}">Crea Nuovo</a></li>
                    <li><a href="{{url('admin/articoli')}}">Vedi Articoli</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventi <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('eventi/create')}}">Crea Nuovo</a></li>
                    <li><a href="{{url('admin/eventi')}}">Vedi Eventi</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallerie <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('gallerie/create')}}">Crea Nuova</a></li>
                    <li><a href="{{url('admin/gallerie')}}">Vedi Gallerie</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Video <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('video/create')}}">Crea Nuovo</a></li>
                    <li><a href="{{url('admin/video')}}">Vedi Video</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tags <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{url('tags/create')}}">Crea Nuova</a></li>
                    <li><a href="{{url('admin/tags')}}">Vedi Tags</a></li>
                </ul>
            </li>

            <li><a href="{{url('tickets')}}">Vedi Tickets</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </li>
        </ul>
    </div>
</nav>