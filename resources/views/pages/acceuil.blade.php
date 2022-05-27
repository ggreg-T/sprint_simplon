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

        <p class="mt-4 fs-4">Are you coming or living in Reunion Island? Are you hiking or 
            walking around to visit the island? Here are a few hundred ideas 
            for outings to rest from hiking or when the day's hike is over. 
            Only places that can be visited without hiking, that take very 
            short routes that never require great effort, small walks that do 
            not require any special training are offered.</p>
        <div class="d-flex flex-wrap ms-4{{-- justify-content-between --}}   ">
            @foreach ($trecks as $treck)
                <div class="d-flex flex-row border_vert_clair border-2 my-3 me-3 rounded-3"
                    style="width:28rem; height:18.8rem;">
                    <a style="{{-- width:57%; height:300px; --}}" href="{{ route('detailTrek', $treck->id) }}"><img
                            style="height:299px;" class="rounded-3 ratio_img" src=" {{ Storage::url($treck->img) }}"
                            alt="not "></a>

                    <div class=" text-center ms-2  ">
                        <p class=" mb-5">{{ $treck->treckName }}</p>
                        <div class="d-flex flex-row m-2">
                            <div class="ms-2 " style="width: 70px;">
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
                                    <strong>Time</strong>
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
        <hr style="padding-left:1%;height:2.5px;margin-top:5px;margin-left:-5px;width:100%;border:none;background-color:rgb(0,
                    0, 0); opacity:1;" />
        <h3>WHO WE ARE ?</h3>
        <p class="text-center"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie,
            dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus,
            ut interdum tellus elit sed risus. Maecenas eget condimentum velit, sit amet feugiat lectus. Class aptent taciti
            sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
            Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac
            rhoncus nisl, eu tempor urna.
            Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia. Aliquam in elementum tellus.</p>

    </div>
@endsection
