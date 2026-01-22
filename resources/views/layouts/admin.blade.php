<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Admin | {{ config('app.name') }}</title>
    @yield('meta')
    <link href="{{ asset('/css/admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin-override.css') }}" rel="stylesheet">

</head>
<body>

    @include('elements.menu-admin')

    <div class="jumbotron">
        <div class="container">
            <h2>@yield('title')</h2>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>

        
    <script src="{{ asset('/js/admin.min.js') }}"></script>
    @yield('scripts')

</body>
</html>