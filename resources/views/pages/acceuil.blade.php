
@extends('layouts.home')
@section('content')
@if(session('success'))
        <p class="alert alert-success mt-3">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p class="alert alert-danger mt-3">{{ session('error') }}</p>
@endif

@foreach ($trecks as $treck)
    <div class="d-flex flex-row border m-3" style="width: 40%;">
    <img style="width:100%; height:500px;" class="mb-5"src="{{ Storage::url($treck->img) }}" alt="img">{{-- img de presantaion --}}
        <div class="m-3 mx-auto">
            <p>{{$treck->treckName}}</p> {{-- nom de sentier --}}
            <div class="d-flex flex-row">
                <div class="">{{-- info droite --}}
                    <p>{{$treck->distance}}</p>
                    <p>{{$treck->nameTreck}}</p>
                </div>
                <div class="">{{-- info gauche --}}
                    <p>{{$treck->hardness}}</p>
                    <p>{{$treck->time}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection