@extends('layouts.home')
@section('content')
    <div class="px-5">
        <h2>{{ $title }}</h2>
        <div class="d-flex flex-row my-3">
            <div class="pull-right">
                <a class="btn btn-primary me-3" href="{{ route('watchTreckers') }}">Watch Treckers</a>
            </div>
        </div>
        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="alert alert-warning">{{ session('error') }}</p>
        @endif
        @foreach ($trecks as $treck)
            <input class="visually-hidden" readonly id="profile" value="{{ $treck->profil }}">
            <input class="visually-hidden" readonly id="coords" value="{{ $treck->coords }}">

            <div class="d-flex flex-column">
                <div class="d-flex flex mb-3">
                    <div id="map" style='width: 50rem; height: 50rem;'>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="info-box bg-info overflow-scroll ms-3" style='height: 50rem;'>
                            <div id="directions">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-between ms-4">
                    <div class="d-flex flex-column">
                        <h2>{{ $treck->treckName }}</h2>
                        <div class="d-flex flex-row mb-3">
                            <div class="d-flex flex-column me-3">
                                <p><span class="fw-bolder">🧑‍🏭 : </span></p>
                                <p>{{ $treck->pseudo }}</p>
                            </div>
                            <div class="d-flex flex-column me-3">
                                <p><span class="fw-bolder">Difficulty : </span></p>
                                <p>{{ $treck->hardness }}</p>
                            </div>
                            <div class="d-flex flex-column me-3">
                                <p><span class="fw-bolder">🕒 : </span></p>
                                <p>{{ $treck->time }}min</p>
                            </div>
                            <div class="d-flex flex-column me-3">
                                <p><span class="fw-bolder">Kind : </span></p>
                                <p>{{ $treck->type }}</p>
                            </div>
                            <div class="d-flex flex-column me-3">
                                <p><span class="fw-bolder">Distance : </span></p>
                                <p>{{ $treck->distance }}Km</p>
                            </div>
                            <div class="d-flex flex-column me-3">
                                <p><span class="fw-bolder">Location : Réunion </span></p>
                                <p>{{ $treck->location }}</p>
                            </div>
                            <div class="d-flex flex-column me-3">
                                <p><span class="fw-bolder">Profile : </span></p>
                                <p>{{ $treck->profil }}</p>
                            </div>
                        </div>
                        <div>
                            <p>{{ $treck->description }}</p>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script type="text/javascript" src='{{ url('js/userPosi.js') }}'></script>
@endsection
