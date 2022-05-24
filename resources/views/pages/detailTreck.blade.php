@extends('layouts.home')
@section('content')
    <div class="px-5">
        @foreach ($trecks as $treck)
            <div class="d-flex flex-row mb-3">
                <div class="d-flex flex-column">
                </div>
                @if (session('success'))
                    <p class="alert alert-success">{{ session('success') }}</p>
                @endif
                @if (session('error'))
                    <p class="alert alert-danger">{{ session('error') }}</p>
                @endif
                <input class="visually-hidden" readonly id="profile" value="{{ $treck->profil }}">
                <input class="visually-hidden" readonly id="coords" value="{{ $treck->coords }}">

                <div class="d-flex flex-row">

                    <div>
                        <h2>{{ $treck->treckName }}</h2>
                        <div class="d-flex flex-column">
                            <div class="">
                                <span class=" fw-bolder">Difficulty : {{ $treck->hardness }}</span>
                                <span class="ms-3 fw-bolder">Time : {{ $treck->time }}min</span>
                                <span class="ms-3 fw-bolder">Kind : {{ $treck->type }}</span>
                            </div>
                            <div class="mt-2">
                                <span class=" fw-bolder">Distance : {{ $treck->distance }}Km</span>
                                <span class="ms-3 fw-bolder">Location : Réunion {{ $treck->location }}</span>
                                <span class="ms-3 fw-bolder">Profile : {{ $treck->profil }}</span>
                                <p>Description : {{ $treck->description }}</p>

                                <h2>Make this Trip</h2>
                            </div>
                        </div>
                        <div class="d-flex flex-row mb-3">
                            @auth
                                <div class="d-flex flex-row">

                                    @if (Auth::user()->admin == false && Auth::user()->id == $treck->idUser && $treck->private == true)
                                        <form action="{{ route('treck.destroy', $treck->id) }}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sur to delete {{ $treck->treckName }} ?');">Delete</button>
                                        </form>
                                    @elseif (Auth::user()->admin == true && $treck->idUser == Auth::user()->id)
                                        <form action="{{ route('treck.destroy', $treck->id) }}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
                                </div>
                            @endauth
                        </div>
                        @guest
                            <button type="button" class="btn btn-light me-3" data-bs-toggle="modal"
                                data-bs-target="#modalLogin">
                                Reserve</button>
                        @endguest
                        @auth
                            <div class="d-flex flex-row">
                                <div class="d-flex">
                                    <form method="POST" action="{{ route('planificationTreck') }}">
                                        @csrf
                                        <input type="text" class="visually-hidden" name="inputTreckName"
                                            value="{{ $treck->treckName }}" readonly>
                                        <input type="text" class="visually-hidden" name="inputTreckId"
                                            value="{{ $treck->id }}" readonly>
                                        <input type="text" class="visually-hidden" name="inputProfil"
                                            value="{{ $treck->profil }}" readonly>
                                        <input type="text" class="visually-hidden" name="inputPrivate"
                                            value="{{ $treck->private }}" readonly>
                                        <div class="d-flex flex-row mb-3">
                                            <div class="form-group form-floating d-flex flex-fill me-3">
                                                <input type="date" class="form-control flex-fill" name="inputDate"
                                                    id="floatingDate" value="{{ old('inputDate') }}" placeholder="Date">
                                                <label for="floatingDate">Date</label>
                                            </div>
                                            <div class="form-group form-floating d-flex flex-fill me-3">
                                                <input type="time" class="form-control flex-fill" name="inputTimeStart"
                                                    id="floatingTimeStart" value="{{ old('inputTimeStart') }}"
                                                    placeholder="Time Start">
                                                <label for="floatingTimeStart">Time Start</label>
                                            </div>
                                        </div>
                                        <div class=" d-flex flex-row">
                                            <div class="form-group form-floating d-flex flex-fill me-3">
                                                <input type="number" class="form-control flex-fill" step="15"
                                                    min="{{ $treck->time }}" name="inputTimeTreck" id="floatingTimeTreck"
                                                    value="{{ $treck->time }}" placeholder="Time Arrival">
                                                <label for="floatingTimeTreck">Time Treck in Min</label>
                                            </div>
                                            <div class="form-group form-floating d-flex flex-fill me-3">
                                                <input type="number" class="form-control flex-fill" step="15" min="0"
                                                    name="inputTimeTampon" id="floatingDate" value="{{ old('inputDate') }}"
                                                    placeholder="Date">
                                                <label for="floatingDate">Temps Tampon in Min</label>
                                            </div>
                                        </div>
                                        <button class="btn btn- mt-3 btnhover" type="submit">Reserve</button>
                                    </form>
                                </div>
                            </div>
                        @endauth
                    </div>
                    <div class="d-flex flex-column mb-3 ms-5 mb-5">
                        <div id="map" style='width: 50rem; height: 30rem;'>
                        </div>
                        <div class="d-flex flex-column mt-2" style='width: 30rem; height: 30rem;'>
                            <div class="info-box bg-info overflow-scroll ms-3">
                                <div id="directions">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    <div class="d-flex flex-column align-items-end mb-5 me-5">
        @auth
            <div class="d-flex flex-row">
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
                @auth
                    <div class="d-flex flex-column">
                        @auth
                            @if (Auth::user()->admin == false && Auth::user()->id == $treck->idUser && $treck->private == true)
                                <form action="{{ route('treck.destroy', $treck->id) }}" method="Post"> 
                                    @csrf 
                                    @method('DELETE') 
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sur to delete {{ $treck->treckName }} ?');">Delete Treck</button> 
                                </form>
                            @elseif (Auth::user()->admin == true && $treck->idUser == Auth::user()->id)
                                <form action="{{ route('treck.destroy', $treck->id) }}" method="Post"> 
                                    @csrf 
                                    @method('DELETE') 
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sur to delete {{ $treck->treckName }} ?');">Delete Treck</button> 
                                </form>
                                <a class="btn btn-info mt-3" href="{{ route('treck.edit', $treck->id) }}">Modify Treck</a>
                            @endif
                        @endauth
                    </div>
                @endauth
            </div>
        @endauth      
        </div>
        
    @endforeach  
    <script type="text/javascript" src='{{ url('js/detailTreck.js') }}'></script>
    </div>
@endsection
