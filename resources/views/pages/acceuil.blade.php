
@extends('layouts.home')
@section('content')
@if(session('success'))
        <p class="alert alert-success mt-3">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p class="alert alert-warning mt-3">{{ session('error') }}</p>
@endif
 <img style="width:100%; height:500px;" class="mb-5"src="{{URL::asset('img/trekk.jpg')}}" alt="img">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quo, veniam ut quis in temporibus adipisci nobis odio rem error. Nobis natus fuga enim necessitatibus atque vitae alias, voluptates facere!</p>

<div class="text-center">
<a href="{{route('getlistTrecks', 'north')}}"><img  src="{{URL::asset('img/La_Reunion_department_relief_location_map_-_NORD.jpg')}}" alt="Logo"></a>
<div class="d-flexflex-row">

<a href="{{route('getlistTrecks', 'west')}}"><img  style="  "src="{{URL::asset('img/La_Reunion_department_relief_location_map_-_OUEST.jpg')}}" alt="Logo"></a>
<a href="{{route('getlistTrecks', 'east')}}"><img  style=" margin:10px "src="{{URL::asset('img/La_Reunion_department_relief_location_map_-_EST.jpg')}}" alt="Logo"></a>
</div>
<a href="{{route('getlistTrecks', 'south')}}"><img  src="{{URL::asset('img/La_Reunion_department_relief_location_map_-_SUD.jpg')}}" alt="Logo"></a>
</div>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore similique quasi officiis maxime perspiciatis obcaecati, tenetur, deleniti tempore necessitatibus earum eius libero esse nulla ducimus. Odio repellat sapiente dolorem quam!</p>
@endsection