@extends('layouts.home')
@section('content')
    <div class="mt-4">
        <div class="my-4 d-flex flex-column">
            <div class="d-flex mb-4 ms-5">
                <h2>{{ $title }}</h2>
            </div>
        </div>
        @if (session('success'))
            <p class="alert alert-danger">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endif
        @if ($error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endif

        <div class="d-flex flex-column flex-sm-row justify-content-between me-5">
            <div class="me-4 ">
                <button type="button" class="btn btn-dark text-white ms-5 px-5" data-bs-toggle="modal"
                    data-bs-target="#modalChoice">
                    Filters</button>
            </div>
            <div class="d-flex flex-row mb-sm-4 mt-sm-0 mt-3 ms-5">
                <button type="button" class="btn btn-dark text-white me-3 text-nowrap" id="btnDistance" onclick="sorteChoice('Distance')">Distance</button>
                <button type="button" class="btn btn-dark text-white me-3 text-nowrap" id="btnTime" onclick="sorteChoice('Time')">Time</button>
                <button type="button" class="btn btn-dark text-white me-3 text-nowrap" id="btnDifficulty" onclick="sorteChoice('Difficulty')">Difficulty</button>
            </div>
        </div>
        <div id="listTrecks" class="visually-hidden">
            {{ $tableTrecks = json_encode($trecks) }}
        </div>
        <div id="divMainTecks" class="d-flex flex-wrap mx-5">
            {{-- <table class="table table-bordered" id="tableTrecks">
                <tr>
                    <th>Circuit Name</th>
                    <th>Image</th>
                    <th>Localisation</th>
                    <th>Hardness</th>
                    <th>Time</th>
                    <th>Type</th>
                    <th>Distance</th>
                    <th>Profile</th>
                </tr>
                @foreach ($trecks as $treck)
                <tr>
                    <td>
                        <form action="{{ route('detailTrek', $treck->id) }}" method="get">
                            <input type="text" class="visually-hidden" 
                                    name="inputTreckId"
                                    value = "{{ $treck->id }}"
                                    readonly >
    
                                <input type="text" class="visually-hidden" 
                                    name="inputDetailUser"
                                    value = "{{ $treck->treckName }}"
                                    readonly >
    
                            <button type="submit" class="form-control me-2 btn bg-info"  
                                    value = "{{ $treck->treckName }}" 
                                    >{{ $treck->treckName }} </button>
    
                        </form>
                    </td>
                    <td>
                        <img style="width: 13rem; height: 10rem" src="{{ Storage::url($treck->img) }}"  alt="no Image avaiable"> 
                       
                    </td>
                    <td>{{ $treck ->location }}</td>
                    <td>{{ $treck ->hardness }}</td>
                    <td>{{ $treck ->time }} min</td>
                    <td>{{ $treck ->type }}</td>
                    <td>{{ $treck ->distance }} km</td>
                    <td>{{ $treck ->profil }}</td>
                </tr>
                @endforeach
            </table> --}}
        <div class="d-flex flex-wrap mb-5">
            @foreach ($trecks as $treck)
                <div class="card ms-5 mt-3 mb-1">
                    {{-- <img src="{{ Storage::url($treck->img) }}" class=" card-img-top  rounded-3 ratio_img"
                            alt="image non chargé"> --}}
                    <a style="{{-- width:57%; height:300px; --}}" href="{{ route('detailTrek', $treck->id) }}">
                        <img class="rounded-3 ratio_img" style="height:11rem;" src=" {{ Storage::url($treck->img) }}"
                        alt="not "></a>
                    <div class="card-body ">
                        <div class="   px-3 text-nowrap   d-flex justify-content-between">
                            <div>
                                <p class=" mb-0 ">Distance</p>
                                <p class=" mb-0 ">Type</p>
                                <p class=" mb-0 ">Difficulty</p>
                                <p class=" mb-0 ">During</p>
                            </div>
                            <div class="clas_ligne_listtreck">
                                <hr class="list_treck " />
                                <hr class="list_treck " />
                                <hr class="list_treck " />
                                <hr class="list_treck_fin " />
                            </div>
                            <div class="text-end ">
                                <p class=" mb-0">{{ $treck->distance }} Km</p>
                                <p class=" mb-0">{{ $treck->type }}</p>
                                <p class=" mb-0">{{ $treck->hardness }}</p>
                                <p class=" mb-0">{{ $treck->time }} min</p>
                            </div>
                        </div>
                        <form action="{{ route('detailTrek', $treck->id) }}" method="get">
                                {{-- <input type="text" class="visually-hidden" name="inputTreckId" value="{{ $treck->id }}"
                                    readonly> --}}
                            <div class="d-flex justify-content-center ">
                                <input type="submit" class="form-control  me-2 text-white btn bouton " id="form_btn"
                                        name="inputDetailUser" value="{{ $treck->treckName }}" readonly>
                             </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection