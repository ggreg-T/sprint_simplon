@extends('layouts.home')
@section('content')
    <div class="mt-4">
        <div class="mb-4">
            <div class="pull-left mb-4">
                <h2>{{ $title }}</h2>
            </div>
            <div class="d-flex flex-row">
                    <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data">Back</a>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($error)
            <div class="alert alert-warning">
                <p>{{ $error }}</p>
            </div>
        @endif

        <div class="d-flex flex-wrap">
        {{-- @foreach ($trecks as $treck)
            <div class="card ms-5 mt-5 mb-1" style="width: 18rem;">
                <!-- <img src="logo.png" class="card-img-top" alt="image non chargé"> -->
                <div class="card-body">

                    
                    <p class="card-text"><form action="{{ route('detailTrek', $treck->id) }}" method="get">
                        <input type="text" class="visually-hidden" 
                                name="inputTreckId"
                                value = "{{ $treck->id }}" readonly>
                        <input type="submit" class="form-control me-2 btn bg-info"  
                                name="inputDetailUser" 
                                value = "{{ $treck->treckName }}" readonly>
                    </form></p>
                   
                </div>
            </div>
        @endforeach --}}
        </div>
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
                <th width="280px">Action</th> 
            </tr>
            @foreach ($trecks as $treck)
            <tr>
                <td>
                    <form action="{{ route('detailTrek', $treck->id) }}" method="get">
                        <input type="text" class="visually-hidden" 
                                name="inputTreckId"
                                value = "{{ $treck->id }}" readonly>
                        <input type="submit" class="form-control me-2 btn bg-info"  
                                name="inputDetailUser" 
                                value = "{{ $treck->treckName }}" readonly>
                    </form>
                </td>
                <td><img style="width: 13rem; height: 10rem" src="{{ Storage::url($treck->img) }}"  alt="no Image avaiable"></td>
                <td>{{ $treck ->location }}</td>
                <td>{{ $treck ->hardness }}</td>
                <td>{{ $treck ->time }}m</td>
                <td>{{ $treck ->type }}</td>
                <td>{{ $treck ->distance }}</td>
                <td>{{ $treck ->profil }}</td>
                @auth
                    <td class="">
                        @if (Auth::user()->admin == false && Auth::user()->id == $treck->idUser && $treck->private == true)
                            <form action="{{ route('treck.destroy', $treck->id) }}" method="Post"> 
                                @csrf 
                                @method('DELETE') 
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sur to delete {{ $treck->treckName }} ?');">Delete</button> 
                            </form>
                        @elseif (Auth::user()->admin == true && $treck->idUser == Auth::user()->id)
                            <form action="{{ route('treck.destroy', $treck->id) }}" method="Post"> 
                                @csrf 
                                @method('DELETE') 
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sur to delete {{ $treck->treckName }} ?');">Delete</button> 
                            </form>
                            <a class="btn btn-info" href="{{ route('treck.edit', $treck->id) }}">Modify</a>
                        @endif
                    </td>
                @endauth
            </tr>
            @endforeach
        </table>
    </div>
@endsection