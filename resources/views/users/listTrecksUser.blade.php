@extends('layouts.home')
@section('content')
    <div class="mt-4">
        <div class="mb-4">
            <div class="pull-left mb-4">
                <h2>{{ $title }}</h2>
            </div>
            <div class="d-flex flex-row">
                <div >
                    <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data">Back</a>
                </div>
                <div>
                    {{-- <form class="d-flex me-5" action="{{ route('searchTreck') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input class="form-control me-2" name="inputSearchTreck" placeholder="Search Treck..." aria-label="Search Treck...">
                            <button class="btn btn-outline-success ms-2" type="submit">🔎</button>
                        </div>
                    </form> --}}
                </div>
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
        <h2>Reservation(s)</h2>
        <table class="table table-bordered">
            <tr>
                <th>Circuit Name</th>
                <th>Image</th>
                <th>Localisation</th>
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
                <td><img style="width: 13rem; height: 10rem" src="{{ Storage::url($treck->img) }}"  alt="{{ $treck->name }}"></td>
                <td>{{ $treck ->treckName }}</td>
                <td>{{ $treck ->location }}</td>
                <td>{{ $treck ->hardness }}</td>
                <td>{{ $treck ->time }}h</td>
                <td>{{ $treck ->type }}</td>
                <td>{{ $treck ->distance }}</td>
                <td>{{ $treck ->profil }}</td>
                {{-- <td class="">
                    @if (Auth::user()->admin == 1)
                        <form action="{{ route('treck.destroy', $treck->id) }}" method="Post"> 
                            @csrf 
                            @method('DELETE') 
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sur to delete {{ $treck->treckName }} ?');">Delete</button> 
                        </form>
                    @endif
                </td> --}}
            </tr>
            @endforeach
        </table>
    </div>
@endsection