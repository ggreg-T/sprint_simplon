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
            @foreach ($trecks as $treck)
                <div id="divTreck" class="d-flex flex-row border_vert_clair border-2 my-3 me-3 rounded-3"
                    style="width:28rem; height:18.8rem;">
                    <a href="{{ route('detailTrek', $treck->id) }}">
                        <img
                            style=" height:299px;" class="rounded-3 ratio_img" src=" {{ Storage::url($treck->img) }}"
                            alt="not "></a>

                    <div class=" text-center ms-2 ">
                        <p class="mb-5">{{ $treck->treckName }}</p>
                        <div class="d-flex flex-row"> 
                            <div class="ms-2 "> 
                                <div class="mb-4"> 
                                    <strong>Distance</strong>
                                    <hr
                                        style="padding-left:1%;height:2.5px;margin-top:5px;margin-left:-5px;width:120%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                                    <p>{{ $treck->distance }} Km</p>
                                </div>
                                <div> 
                                    <strong>Type</strong>
                                    <hr
                                        style="height:2.5px;margin-top:5px;margin-left:-5px;width:120%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                                    {{ $treck->type }}
                                </div>
                            </div>
                            <div class="ps-3"> 
                                <div class="mb-4"><strong>Difficulty</strong>
                                    <hr
                                        style="height:2.5px;margin-top:5px;width:100%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                                    {{ $treck->hardness }}
                                </div>
                                <div class="">
                                    <strong>Time
                                    </strong>
                                    <hr
                                        style="height:2.5px;margin-top:5px;width:100%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                                    {{ $treck->time }} min
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
