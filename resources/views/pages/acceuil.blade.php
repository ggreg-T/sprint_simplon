@extends('layouts.home')
@section('content')
    <img src="{{ URL::asset('img/test.png') }}" style="display:absolute; width:100%; height:400px;" alt="not found">
    <div class="px-5">
        @if (session('success'))
            <p class="alert alert-success mt-3">{{ session('success') }}</p>
        @endif
        @if (session('error'))
            <p class="alert alert-danger mt-3">{{ session('error') }}</p>
        @endif

        <p class="mt-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. At blanditiis, aliquam sapiente
            ipsa
            sed cupiditate eaque
            maiores labore libero eius commodi harum iure debitis. Ipsa at qui nisi possimus quam?</p>
        <div class="d-flex flex-row  justify-content-between ">
            @foreach ($trecks as $treck)
                <div class="d-flex flex-row border_vert_clair border-2 my-3 me-3 rounded-3"
                    style="width:30rem; height:18.8rem;">
                    <a style="width:57%; height:300px;" href="{{ route('detailTrek', $treck->id) }}"><img
                            style="width:100%; height:299px;" class="rounded-3" src=" {{ Storage::url($treck->img) }}"
                            alt="not "></a>

                    <div class=" text-center ms-2 ">
                        <p class="mb-5">{{ $treck->treckName }}</p>
                        <div class="d-flex flex-row">
                            <div class="ms-2 ">
                                <div class="mb-4"> <strong>Distance</strong>
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
                                    <strong>Durer
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
    </div>
@endsection
