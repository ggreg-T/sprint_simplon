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
            @foreach ($trecks as $treck)
                <div class="card ms-5 mt-5 mb-1" style="width: 18rem;">
                    <img src="{{ Storage::url($treck->img) }}" class=" card-img-top ratio_img" alt="image non chargé">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <p class="card-text text-center">Distance</p>
                            <hr
                                style="padding-left:1%;height:2.5px;margin-top:15px;margin-left:5px;width:45%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                            <p>{{ $treck->distance }} Km
                            </p>
                        </div>
                        <div class="d-flex flex-row">
                            <p class="card-text text-center">Type</p>
                            <hr
                                style="padding-left:1%;height:2.5px;margin-top:15px;margin-left:5px;width:50%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                            <p>{{ $treck->type }}
                            </p>
                        </div>
                        <div class="d-flex flex-row">
                            <p class="card-text text-center">Difficulty</p>
                            <hr
                                style="padding-left:1%;height:2.5px;margin-top:15px;margin-left:5px;width:50%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                            <p>{{ $treck->hardness }}
                            </p>
                        </div>
                        <div class="d-flex flex-row">
                            <p class="card-text text-center">During</p>
                            <hr
                                style="padding-left:1%;height:2.5px;margin-top:15px;margin-left:5px;width:50%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
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
