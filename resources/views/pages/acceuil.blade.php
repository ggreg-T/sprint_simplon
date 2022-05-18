@extends('layouts.home')
@section('content')
    @if (session('success'))
        <p class="alert alert-success mt-3">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p class="alert alert-danger mt-3">{{ session('error') }}</p>
    @endif
    <img src="{{ URL::asset('img/test.png') }}" style="width: 100%" alt="not found">
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. At blanditiis, aliquam sapiente ipsa sed cupiditate eaque
        maiores labore libero eius commodi harum iure debitis. Ipsa at qui nisi possimus quam?</p>
    <div class="d-flex flex-row  justify-content-between ">
        @foreach ($trecks as $treck)
            <div class="d-flex flex-row border my-3 me-3 rounded-3" style="width:32rem; height:18.8rem;">
                <a style="width:50%; height:300px;" href="{{ route('detailTrek', $treck->id) }}"><img
                        style="width:100%; height:300px;" class="rounded-3" src=" {{ Storage::url($treck->img) }}"
                        alt="{{ Storage::url($treck->img) }}"></a>
                <div class=" text-center ms-3">
                    <p class="mb-5">{{ $treck->treckName }}</p> {{-- nom de sentier --}}
                    <div class="d-flex flex-row">
                        <div class="ms-2 ">{{-- info droite --}}
                            <div class="mb-4"> <strong>Distance</strong>
                                <hr
                                    style="height:2.5px;margin:5px;width:100%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                                {{ $treck->distance }} Km
                            </div>
                            <div class="">
                                <strong>Type</strong>
                                <hr
                                    style="height:2.5px;margin:5px;width:100%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                                {{ $treck->type }}
                            </div>
                        </div>
                        <div class="px-3">{{-- info gauche --}}
                            <div class="mb-4"><strong>Difficulty</strong>
                                <hr
                                    style="height:2.5px;margin:5px;width:100%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                                {{ $treck->hardness }}
                            </div>
                            <div class="">
                                <strong>Durer
                                </strong>
                                <hr
                                    style="height:2.5px;margin:5px;width:100%;border:none;background-color:rgb(0, 0, 0); opacity:1;" />
                                {{ $treck->time }} min
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection