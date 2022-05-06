<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TreckingSecu.re</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

{{-- ###---for map---############################################################################################### --}}
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.50.0/mapbox-gl.css' rel='stylesheet' />
    {{-- for the line draw to make own route --}}
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.9/mapbox-gl-draw.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.9/mapbox-gl-draw.css' type='text/css' />

    <link href="{{ url('css/userTreck.css') }}" rel="stylesheet" type="text/css">
    {{-- ###---for map start & endpoint---########################################################################## --}}
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
{{-- ############################################################################################################### --}}
   
    
</head>
    <body>
        @include('layouts.navbar')
        <main class="">
            {{-- <h2>{{ $title }}</h2> --}}
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quo, veniam ut quis in temporibus adipisci nobis odio rem error. Nobis natus fuga enim necessitatibus atque vitae alias, voluptates facere!</p>
            
            @yield('content')
        </main>
    </body>
    @include('layouts.footer')
</html>
<script src="{{ asset('js/app.js') }}" defer></script>
<script type="text/javascript" src='{{ url('js/userTreck.js') }}'></script>
