@extends('layouts.home')
@section('content')
   
    <div class="d-flex flex-row mb-3">
        <div class="pull-right">
            <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data"> Back</a>
        </div>
    </div>
    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p class="alert alert-danger">{{ session('error') }}</p>
    @endif
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
        <div>
            <h2>Make this Trip</h2>
        @guest
            <button type="button" class="btn btn-light me-3" data-bs-toggle="modal" data-bs-target="#modalLogin">
                Reserve</button>
        @endguest
        @auth
            <div class="d-flex">
                <form method="POST" action="{{ route('planificationTreck') }}">
                    @csrf
                    <input type="text" class="visually-hidden" name="inputTreckName" value="{{ $treck->treckName }}" readonly>
                    {{-- <input type="text" class="visually-hidden" name="inputTreckTime" value="{{ $treck->time }}" readonly> --}}
                    <input type="text" class="visually-hidden" name="inputTreckId" value="{{ $treck->id }}" readonly>
                    <input type="text" class="visually-hidden" name="inputProfil" value="{{ $treck->profil }}" readonly>
                    <input type="text" class="visually-hidden" name="inputPrivate" value="{{ $treck->private }}" readonly>
                    <div class="d-flex flex-row mb-3">
                        <div class="form-group form-floating d-flex flex-fill me-3">
                            <input type="date" class="form-control flex-fill" name="inputDate" id="floatingDate" value="{{ old('inputDate') }}" placeholder="Date">
                            <label for="floatingDate">Date</label>
                        </div>
                        <div class="form-group form-floating d-flex flex-fill me-3">
                            <input type="time" class="form-control flex-fill" name="inputTimeStart" id="floatingTimeStart" value="{{ old('inputTimeStart') }}" placeholder="Time Start">
                            <label for="floatingTimeStart">Time Start</label>
                        </div>
                    </div>
                    <div class="mb-3 d-flex flex-row">
                        <div class="form-group form-floating d-flex flex-fill me-3">
                            <input type="number" class="form-control flex-fill" step="15" min="{{ $treck->time }}" name="inputTimeTreck" id="floatingTimeTreck" value="{{ $treck->time }}" placeholder="Time Arrival">
                            <label for="floatingTimeTreck">Time Treck in Min</label>
                        </div>
                        <div class="form-group form-floating d-flex flex-fill me-3">
                            <input type="number" class="form-control flex-fill" step="15" min="0" name="inputTimeTampon" id="floatingDate" value="{{ old('inputDate') }}" placeholder="Date">
                            <label for="floatingDate">Temps Tampon in Min</label>
                        </div>
                        
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Reserve</button>
                </form>
            </div>
        @endauth      
        </div>
          
    @endforeach  
    <script type="text/javascript" src='{{ url('js/detailTreck.js') }}'></script>
@endsection