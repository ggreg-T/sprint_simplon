@extends('layouts.home')
@section('content')
   
    <div class="d-flex flex-row mb-3">
        <div class="pull-right">
            <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data"> Back</a>
        </div>
    </div>
    @foreach ($trecks as $treck)
    <input class="visually-hidden" readonly id="profile" value="{{ $treck->profil }}">
    <input class="visually-hidden" readonly id="coords" value="{{ $treck->coords }}">
        
        <div class="d-flex flex-row">
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
                        <span class="fw-bolder">🧑‍🏭 : {{ $treck ->pseudo }}</span>
                        <span class="ms-5 fw-bolder">Difficulty : {{ $treck ->hardness }}</span>
                        <span class="ms-5 fw-bolder">🕒 : {{ $treck ->time }}min</span>
                        <span class="ms-5 fw-bolder">Kind : {{ $treck ->type }}</span>
                        <span class="ms-5 fw-bolder">Distance : {{ $treck ->distance }}Km</span>
                        <span class="ms-5 fw-bolder">Location : Réunion {{ $treck ->location }}</span>
                        <span class="ms-5 fw-bolder">Profile : {{ $treck ->profil }}</span>
                        
                        <p>{{ $treck ->description }} 
                    </div>
                    {{-- @auth
                        @if (Auth::user()->admin == true)
                        <div class="d-flex flex-row">
                            <form class="d-flex flex-fill" action="{{ route('movies.destroy', $movie->id) }}" method="Post"> 
                                <a class="btn btn-primary flex-fill me-2" href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                                @csrf 
                                @method('DELETE')                                      
                                <button type="submit" class="btn btn-danger flex_fill" onclick="return confirm('The Movie and all Comments will be deleted');">Delete</button> 
                            </form>
                        </div>
                        @endif
                    @endauth --}}
                
            </div>
        </div>
    </div>
 {{-- <script type="text/javascript" src='{{ url('js/detailTreck.js') }}'></script> --}}
     
    @endforeach  
    <script type="text/javascript" src='{{ url('js/detailTreck.js') }}'></script>  
@endsection