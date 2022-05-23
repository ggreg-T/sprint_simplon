@extends('layouts.home')
@section('content')
    <div class="mt-4">
        <div class="my-4 d-flex flex-column">
            <div class="d-flex mb-4">
                <h2>{{ $title }}</h2>
            </div>
            <div class="d-flex flex-row">
                <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data">Back</a>
            </div>
        </div>
        @if (session('success'))
            <p class="alert alert-danger">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endif

        <div class="d-flex flex-wrap">
            @foreach ($trecks as $treck)
                <div class="card ms-5 mt-5 mb-1" style="width: 18rem;">
                    <img src="{{ Storage::url($treck->img) }}" class=" card-img-top" alt="image non chargé">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <p class="card-text text-center">Distance</p>
                            <hr style="padding-left:1%;height:2.5px;margin-top:15px;margin-left:5px;width:50%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                            <p>{{ $treck->distance }} Km
                            </p>
                        </div>
                        <div class="d-flex flex-row">
                            <p class="card-text text-center">Type</p>
                            <hr style="padding-left:1%;height:2.5px;margin-top:15px;margin-left:5px;width:50%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                            <p>{{ $treck->type }}
                            </p>
                        </div>
                        <div class="d-flex flex-row">
                            <p class="card-text text-center">Difficulty</p>
                            <hr style="padding-left:1%;height:2.5px;margin-top:15px;margin-left:5px;width:50%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                            <p>{{ $treck->hardness }}
                            </p>
                        </div>
                        <div class="d-flex flex-row">
                            <p class="card-text text-center">During</p>
                            <hr style="padding-left:1%;height:2.5px;margin-top:15px;margin-left:5px;width:50%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                            <p>{{ $treck->time }} min
                            </p>
                        </div>
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

        </div>
    @endsection
