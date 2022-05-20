@extends('layouts.home')
@section('content')
    <div class="mt-4">
        <div class="my-4 d-flex flex-column">
            <div class="d-flex mb-4">
                <h2>{{ $title }}</h2>
            </div>
            <div class="d-flex flex-row" >
                <a class="btn btn-primary me-3" href="{{ route('home') }}">Back</a>
            </div>
        </div>
        @if (session('success'))
            <p class="alert alert-danger">{{ session('success') }}</p>
        @endif
        @if(session('error'))
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endif
        @if ($error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endif

        <div class="d-flex flex-row justify-content-between">
            <div>
                <button type="button" class="btn btn-dark text-white me-3" data-bs-toggle="modal" data-bs-target="#modalChoice">
                Filter</button>
            </div>
            <div class="d-flex flex-row mb-4">
                <button type="button" class="btn btn-dark text-white me-3">
                    Distance </button>
                <button type="button" class="btn btn-dark text-white me-3">
                    Time </button>
                <button type="button" class="btn btn-dark text-white me-3">
                    Difficulty </button>
            </div>
        </div>
        
        
        <div class="d-flex flex-wrap">
        @foreach ($trecks as $treck)
            <div class="card ms-5 mt-5 mb-1" style="width: 18rem;">
                <img src="{{Storage::url($treck->img)}}" class="card-img-top" alt="image non chargé">
                <div class="card-body">
                    
                    <form action="{{ route('detailTrek', $treck->id) }}" method="get">
                        <p class="card-text">
                            <input type="text" class="visually-hidden" 
                                    name="inputTreckId"
                                    value = "{{ $treck->id }}" 
                                    readonly />
                
                            <input type="text" class="visually-hidden"  
                                    name="inputDetailUser" 
                                    value = "{{ $treck->treckName }}"
                                    readonly />

                            <button type="submit" class="form-control me-2 btn bg-info"  
                                    value = "{{ $treck->treckName }}">
                                {{ $treck->treckName }} 
                            </button>
                        </p>
                    </form>
                </div>
            </div>
        @endforeach
        @endsection
        <!-- </div>
        <table class="table table-bordered">
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
                <td>{{ $treck ->time }}m</td>
                <td>{{ $treck ->type }}</td>
                <td>{{ $treck ->distance }}</td>
                <td>{{ $treck ->profil }}</td>
            </tr>
            @endforeach
        </table>
    </div> -->
