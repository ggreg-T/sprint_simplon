@extends('layouts.home')
@section('content')
	<h2>{{ $title }}</h2>

	<div id="">
		<div >
			<a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data">Back</a>
		</div>
		<table class="table table-bordered">
            <tr>
                <th>Pseudo</th>
				<th>Circuit</th>
				<th>Time</th>
				<th>Start</th>
				<th>Arrive</th>
				<th>Tampon End</th>
            </tr>
			{{-- @foreach ($treckers as $trecker)
				<tr class=
					"@if ($trecker->treckStart == 1 && $trecker->treckEnd) ">
					<td>{{ $trecker->pseudo }}</td>
					<td>{{ $trecker->treckName }}</td>
					<td>{{ $trecker->timeTreck }}</td>
					<td>{{ $trecker->treckStart }}</td>
					<td>{{ $trecker->treckEnd }}</td>
					<td>{{ $trecker->endLimit }}</td>
				</tr>
			@endforeach --}}
	</div>
@endsection
