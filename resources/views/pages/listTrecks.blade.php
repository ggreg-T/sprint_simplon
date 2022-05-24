@extends('layouts.home')
@section('content')
    <div class="mt-4 px-5">
        <div class="mt-4 d-flex flex-column">
            <div class="d-flex mb-4">
                <h2>{{ $title }}</h2>
            </div>
            <p class="text-center"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie,
            dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus,
            ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti
            sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
            Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac
            rhoncus nisl, eu tempor urna.</p>
        </div>
        @if (session('success'))
            <p class="alert alert-danger">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endif
        
        <div class="d-flex flex-wrap">
            <table class="table table-bordered" id="tableTrecks">
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
            </table>
        <!-- @foreach ($trecks as $treck)
            <div class="card ms-5 mt-5 mb-1" style="width: 18rem;">
                <img src="{{Storage::url($treck->img)}}" class="card-img-top" alt="image non chargé">
                <div class="card-body">
                    
                    <form action="{{ route('detailTrek', $treck->id) }}" method="get">
                        <p class="card-text">
                        <form action="{{ route('detailTrek', $treck->id) }}" method="get">
                            <input type="text" class="visually-hidden" name="inputTreckId" value="{{ $treck->id }}"
                                readonly>
                            <input type="submit" class="form-control me-2 text-white btn bouton" name="inputDetailUser"
                                value="{{ $treck->treckName }}" readonly>
                        </form>
                        </p>

                    </div>
                </div>
            @endforeach

        </div> -->
    @endsection
