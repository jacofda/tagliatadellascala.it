<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="author" href="https://plus.google.com/118051754894364402890/about" />
    <link rel="publisher" href="https://www.google.com/+TagliatadellascalaItsapori" />
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    @yield('meta')
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,300,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dosis:300,400,700">
    <link href="{{ asset('theme/css/theme.min.css') }}" rel="stylesheet">
    @yield('css')



<script async src="https://www.googletagmanager.com/gtag/js?id=UA-47846842-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-47846842-7');
</script>
</head>
<body>
    <div class="page" id="top">

        @include('elements.menu')

        @yield('title')
        @yield('full-content')
        <section class="page-section">
            <div class="container relative">
                @include('elements.session')
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </section>

        @include('elements.footer')

    </div>
    <script src="{{ asset('theme/all.min.js')}}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    @yield('scripts')
</body>
</html>
