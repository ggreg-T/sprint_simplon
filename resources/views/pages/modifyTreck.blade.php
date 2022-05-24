@extends('layouts.home')
@section('content')
    <div class="px-5 d-flex flex-row">
        <div class="mt-5 ">
            <h2 class="mb-5">{{ $title }}</h2>
            <form method="POST" action="{{ route('treckUpdate', $treck[0]->id) }}" enctype="multipart/form-data">
                @csrf
                <input class="visually-hidden" readonly name="inputPseudo" value="{{ Auth::user()->pseudo }}">
                <input class="visually-hidden" readonly name="inputPseudoId" value="{{ Auth::user()->id }}">
                <input class="visually-hidden" readonly name="inputPrivate"
                    @if (Auth::user()->admin == true) value=0
        @else value=1 @endif>

                <div class="d-flex flex-row mb-3">
                    <div class="form-group form-floating me-3 flex-fill">
                        <input id="floatingCircuitName" type="text" class="form-control flex-fill" name="inputCircuitName"
                            value="{{ $treck[0]->treckName }}" required>
                        <label for="floatingCircuitName">CircuitName</label>
                    </div>

                    <div class="form-group form-floating mb-3">
                        <input type="file" name="img" id="inputImage" class="form-control"
                            @if (Auth::user()->admin == true) required @endif>
                    </div>
                </div>
                <div class="form-group form-floating flex-fill mb-3">
                    <input id="floatingTime" type="number" class="form-control" name="inputTime"
                        value="{{ $treck[0]->time }}" required readonly>
                    <label for="floatingTime">Time in Minutes</label>
                </div>
                <div class="d-flex flex-row mb-3">

                    @if (Auth::user()->admin == true)
                        <div class="d-flex text-center flex-fill me-2">
                            <input id="floatingSubmit" type="button" class="btn btn-success flex-fill" value="Hardness :"
                                disabled>
                            <label for="floatingSubmit"></label>
                        </div>
                        <div class="d-flex text-center flex-fill me-2">
                            <input id="floatingOldHardness" type="button" class="btn btn-success flex-fill"
                                value="{{ $treck[0]->hardness }}" disabled>
                            <label for="floatingOldHardness"></label>
                        </div>
                        <div class="d-flex flex-fill me-3">
                            <input type="radio" name="inputHardness" value="⭐" class="btn-check"
                                id="btn-check-outlined-1" autocomplete="off" required>
                            <label
                                class="btn btn-outline-primary flex-fill d-flex align-items-center justify-content-center"
                                for="btn-check-outlined-1">⭐</label><br>
                        </div>
                        <div class="d-flex flex-fill me-3">
                            <input type="radio" name="inputHardness" value="⭐⭐" class="btn-check"
                                id="btn-check-outlined-2" autocomplete="off">
                            <label
                                class="btn btn-outline-primary flex-fill d-flex align-items-center justify-content-center"
                                for="btn-check-outlined-2">⭐⭐</label><br>
                        </div>
                        <div class="d-flex flex-fill me-3">
                            <input type="radio" name="inputHardness" value="⭐⭐⭐" class="btn-check"
                                id="btn-check-outlined-3" autocomplete="off">
                            <label
                                class="btn btn-outline-primary flex-fill d-flex align-items-center justify-content-center"
                                for="btn-check-outlined-3">⭐⭐⭐</label><br>
                        </div>
                        <div class="d-flex flex-fill me-3">
                            <input type="radio" name="inputHardness" value="⭐⭐⭐⭐" class="btn-check"
                                id="btn-check-outlined-4" autocomplete="off">
                            <label
                                class="btn btn-outline-primary flex-fill d-flex align-items-center justify-content-center"
                                for="btn-check-outlined-4">⭐⭐⭐⭐</label><br>
                        </div>
                        <div class="d-flex flex-fill">
                            <input type="radio" name="inputHardness" value="⭐⭐⭐⭐⭐" class="btn-check"
                                id="btn-check-outlined-5" autocomplete="off">
                            <label
                                class="btn btn-outline-primary flex-fill d-flex align-items-center justify-content-center"
                                for="btn-check-outlined-5">⭐⭐⭐⭐⭐</label><br>
                        </div>
                    @endif
                </div>

                <div class="d-flex flex-row flex-wrap mb-3">
                    <div class="d-flex text-center flex-fill me-2">
                        <input id="floatingOldType" type="button" class="btn btn-success flex-fill"
                            value="{{ $treck[0]->type }}" disabled>
                        <label for="floatingOldType"></label>
                    </div>
                    <div class="d-flex flex-fill me-3">
                        <input type="radio" name="inputType" value="round" class="btn-check"
                            id="btn-check-outlined-round" autocomplete="off" required onclick="distanceX1()">
                        <label class="btn btn-outline-primary flex-fill" for="btn-check-outlined-round">Round</label><br>
                    </div>
                    <div class="d-flex flex-fill me-3">
                        <input type="radio" name="inputType" value="go&back" class="btn-check"
                            id="btn-check-outlined-go&back" autocomplete="off" onclick="distanceX2()">
                        <label class="btn btn-outline-primary flex-fill" for="btn-check-outlined-go&back">Go &
                            Back</label><br>
                    </div>
                    <div class="d-flex flex-fill me-3">
                        <input type="radio" name="inputType" value="oneway" class="btn-check"
                            id="btn-check-outlined-oneway" autocomplete="off" onclick="distanceX1()">
                        <label class="btn btn-outline-primary flex-fill" for="btn-check-outlined-oneway">One
                            Way</label><br>
                    </div>
                </div>
                <div class="d-flex flex-fill mb-3">

                    <div class="d-flex flex-fill">
                        <div class="d-flex text-center flex-fill me-2">
                            <input id="floatingOldLoca" type="button" class="btn btn-success flex-fill"
                                value="{{ $treck[0]->location }}" disabled>
                            <label for="floatingOldLoca"></label>
                        </div>
                        <div class="d-flex flex-fill me-3">
                            <input type="radio" name="inputLocation" value="north" class="btn-check"
                                id="btn-check-outlined-north" autocomplete="off" required>
                            <label class="btn btn-outline-primary flex-fill"
                                for="btn-check-outlined-north">North</label><br>
                        </div>
                        <div class="d-flex flex-fill me-3">
                            <input type="radio" name="inputLocation" value="east" class="btn-check"
                                id="btn-check-outlined-east" autocomplete="off">
                            <label class="btn btn-outline-primary flex-fill" for="btn-check-outlined-east">East</label><br>
                        </div>
                        <div class="d-flex flex-fill me-3">
                            <input type="radio" name="inputLocation" value="south" class="btn-check"
                                id="btn-check-outlined-south" autocomplete="off">
                            <label class="btn btn-outline-primary flex-fill"
                                for="btn-check-outlined-south">South</label><br>
                        </div>
                        <div class="d-flex flex-fill">
                            <input type="radio" name="inputLocation" value="west" class="btn-check"
                                id="btn-check-outlined-west" autocomplete="off">
                            <label class="btn btn-outline-primary flex-fill" for="btn-check-outlined-west">West</label><br>
                        </div>
                    </div>
                </div>

                <div class="form-group form-floating mb-3">
                    <textarea id="floatingDescription" class="form-control" rows="8" cols="80" name="inputDescription"
                        required>{{ $treck[0]->description }}</textarea>
                    <label for="floatingDescription">Description</label>
                </div>
                <div class="form-group form-floating mb-3">
                    <textarea id="coords" class="form-control" rows="8" cols="80" name="inputCoords" readonly
                        required>{{ $treck[0]->coords }}</textarea>
                    <label for="coords">Coords</label>
                </div>
                <div class="d-flex flex-row mb-3">
                    <div class="form-group form-floating  me-3">
                        <input id="profile" type="text" class="form-control" name="inputProfile" readonly
                            value="{{ $treck[0]->profil }}" required>
                        <label for="profile">Profile</label>
                    </div>
                    <div class="form-group form-floating  me-3">
                        <input id="floatingDistance" type="text" class="form-control" name="inputDistance" readonly
                            value="{{ $treck[0]->distance }}" required>
                        <label for="floatingDistance">Distance in Km</label>
                    </div>
                </div>
                <div class="d-flex flex-row mb-5">

                    @if (Auth::user()->admin == true)
                        <div class="d-flex text-center flex-fill me-2 mb-3">
                            <input id="floatingOldLoca" type="button" class="btn btn-success flex-fill"
                                @if ($treck[0]->private == 0) value="Public"
                    @else value="Private" @endif
                                disabled>
                            <label for="floatingOldLoca"></label>
                        </div>
                        <div class="d-flex flex-fill me-3 mb-3">
                            <input type="radio" name="inputPrivate" value="0" class="btn-check" id="privateFalse"
                                autocomplete="off" required>
                            <label class="btn btn-outline-primary flex-fill pt-2 fw-bold fs-4"
                                for="privateFalse"><span>Public</span></label>
                        </div>
                        <div class="d-flex flex-fill me-3 mb-3">
                            <input type="radio" name="inputPrivate" value="1" class="btn-check" id="privateTrue"
                                autocomplete="off">
                            <label class="btn btn-outline-primary flex-fill pt-2 fw-bold fs-4"
                                for="privateTrue"><span>Private</span></label>
                        </div>
                        <div class="d-flex text-center flex-fill pb-3">
                            <input id="floatingSubmit" type="submit" class="btn btn-primary flex-fill" name=""
                                value="Send Mondifications">
                            <label for="floatingSubmit"></label>
                        </div>
                    @endif

                </div>
            </form>
        </div>


        <div class="d-flex flex-column ms-5 mt-5">

            @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            @if (session('error'))
                <p class="alert alert-danger">{{ session('error') }}</p>
            @endif
            <div class="d-flex flex mb-3">
                <div id='map' style='width: 50rem; height: 50rem;'>
                </div>
                <div class="d-flex flex-column">
                    <div class="info-box bg-info overflow-scroll ms-3" style='height: 50rem;'>
                        <div id="directions">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script type="text/javascript" src='{{ url('js/detailTreck.js') }}'></script>
@endsection
