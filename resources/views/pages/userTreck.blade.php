@extends('layouts.home')
@section('content')
    <div class="px-5">
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
        <link rel="stylesheet"
            href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css"
            type="text/css">
        <div class="d-flex flex-row ms-5 my-5">
            <div id='map' style='width: 50rem; height: 37rem;'>
            </div>
            <div class="d-flex flex-column">
                <div class="d-flex flex-row flex-fill">
                    <div class="d-flex form-check flex-fill">
                        <input type="radio" class="btn-check" name="go_type" id="walking" autocomplete="off">
                        <label class="btn btn-outline-primary fs-2 fw-bold" for="walking">👣</label><br>
                    </div>
                    <div class="d-flex form-check flex-fill">
                        <input type="radio" class="btn-check" name="go_type" id="bike" autocomplete="off">
                        <label class="btn btn-outline-primary fs-2 fw-bold" for="bike">🚴‍♂️</label><br>
                    </div>
                </div>
                <div class="info-box bg-info overflow-auto m-4">
                    <div id="directions">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
