
@extends('layouts.home')
@section('content')


<div class="d-flex flex-column ms-5 mt-5">
    <h2 class="mb-5">{{ $title }}</h2>
    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
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
    <div>
        <form method="POST" action="{{ route('treck.store')}}">
            @csrf
            <input class="visually-hidden" readonly name="inputPseudo" value="{{ Auth::user()->pseudo }}">
            <input class="visually-hidden" readonly name="inputPseudoId" value="{{ Auth::user()->id }}">
            <div class="form-group form-floating mb-3">
                <input id="floatingCircuitName" type="text" class="form-control" name="inputCircuitName" required>
                <label for="floatingCircuitName">CircuitName</label>
            </div>

            <div class="d-flex flex-row mb-3">
                <div class="form-group form-floating flex-fill me-3">
                    <input id="floatingTime" type="number" min="0" step=".5" class="form-control" name="inputTime" required>
                    <label for="floatingTime">Time in Hour H</label>
                </div>
                <div class="d-flex text-center flex-fill me-2">
                    <input id="floatingSubmit" type="button" class="btn btn-success flex-fill" name="" value="Hardness :" disabled>
                    <label for="floatingSubmit"></label>
                </div>
                <div class = "d-flex flex-fill me-3">
                    <input type="radio" name = "inputHardness" value="⭐" class="btn-check" id="btn-check-outlined-1" autocomplete="off" required>
                    <label class="btn btn-outline-primary flex-fill d-flex align-items-center justify-content-center" for="btn-check-outlined-1">⭐</label><br>
                </div> 
                <div class = "d-flex flex-fill me-3">
                    <input type="radio" name = "inputHardness" value="⭐⭐" class="btn-check" id="btn-check-outlined-2" autocomplete="off">
                    <label class="btn btn-outline-primary flex-fill d-flex align-items-center justify-content-center" for="btn-check-outlined-2">⭐⭐</label><br>
                </div> 
                <div class = "d-flex flex-fill me-3">
                    <input type="radio" name = "inputHardness" value="⭐⭐⭐" class="btn-check" id="btn-check-outlined-3" autocomplete="off">
                    <label class="btn btn-outline-primary flex-fill d-flex align-items-center justify-content-center" for="btn-check-outlined-3">⭐⭐⭐</label><br>
                </div> 
                <div class = "d-flex flex-fill me-3">
                    <input type="radio" name = "inputHardness" value="⭐⭐⭐⭐" class="btn-check" id="btn-check-outlined-4" autocomplete="off">
                    <label class="btn btn-outline-primary flex-fill d-flex align-items-center justify-content-center" for="btn-check-outlined-4">⭐⭐⭐⭐</label><br>
                </div> 
                <div class = "d-flex flex-fill">
                    <input type="radio" name = "inputHardness" value="⭐⭐⭐⭐⭐" class="btn-check" id="btn-check-outlined-5" autocomplete="off">
                    <label class="btn btn-outline-primary flex-fill d-flex align-items-center justify-content-center" for="btn-check-outlined-5">⭐⭐⭐⭐⭐</label><br>
                </div> 
            </div>

                

            <div class="d-flex flex-row flex-wrap mb-3">
                <div class = "d-flex flex-fill me-3">
                    <input type="radio" name = "inputLocation" value="north" class="btn-check" id="btn-check-outlined-north" autocomplete="off" required>
                    <label class="btn btn-outline-primary flex-fill" for="btn-check-outlined-north">North</label><br>
                </div> 
                <div class = "d-flex flex-fill me-3">
                    <input type="radio" name = "inputLocation" value="east" class="btn-check" id="btn-check-outlined-east" autocomplete="off">
                    <label class="btn btn-outline-primary flex-fill" for="btn-check-outlined-east">East</label><br>
                    </div> 
                <div class = "d-flex flex-fill me-3">
                    <input type="radio" name = "inputLocation" value="south" class="btn-check" id="btn-check-outlined-south" autocomplete="off">
                    <label class="btn btn-outline-primary flex-fill" for="btn-check-outlined-south">South</label><br>
                </div> 
                <div class = "d-flex flex-fill">
                    <input type="radio" name = "inputLocation" value="west" class="btn-check" id="btn-check-outlined-west" autocomplete="off">
                    <label class="btn btn-outline-primary flex-fill" for="btn-check-outlined-west">West</label><br>
               </div> 
            </div>
            
            <div class="form-group form-floating mb-3">
                <textarea id="floatingDescription" class="form-control" rows="8" cols="80" name="inputDescription" required></textarea>
                <label for="floatingDescription">Description</label>
            </div>
            <div class="form-group form-floating mb-3">
                <textarea id="floatingCoords" class="form-control" rows="8" cols="80" name="inputCoords" readonly required></textarea>
                <label for="floatingCoords">Coords</label>
            </div>
            <div class="d-flex flex-row mb-5">
                <div class="form-group form-floating mb-3 me-3">
                    <input id="floatingProfile" type="text" class="form-control" name="inputProfile" readonly required>
                    <label for="floatingProfile">Profile</label>
                </div>
                {{-- <div class="d-flex flex-fill me-3">
                    <input type="radio" class="btn-check flex-fill" name="go_type" id="walking" autocomplete="off" checked>
                    <label class="btn btn-outline-primary fs-4 flex-fill" for="walking" >👣</label><br>
                </div>
                <div class="d-flex flex-fill me-3">
                    <input type="radio" class="btn-check flex-fill" name="go_type" id="bike" autocomplete="off">
                    <label class="btn btn-outline-primary fs-4 flex-fill" for="bike">🚴‍♂️</label><br>
                </div> --}}
                <div class="d-flex text-center flex-fill pb-3">
                    <input id="floatingSubmit" type="submit" class="btn btn-primary flex-fill" name="" value="Add New Treck">
                    <label for="floatingSubmit"></label>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection