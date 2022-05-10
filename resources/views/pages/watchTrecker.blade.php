@extends('layouts.home')
@section('content')
	<h2>{{ $title }}</h2>

	<div id="">
		<div >
			<a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data">Back</a>
		</div>
		<table class="table table-bordered">
            <tr>
                <th>Date</th>
                <th>Pseudo</th>
				<th>Circuit</th>
				<th>Treck Time</th>
				<th>Start</th>
				<th>Arrival</th>
				<th>Arrival Limite</th>
            </tr>
			@foreach ($treckers as $trecker)
				<tr 
				@if ($trecker->treckStandBy == false) class="bg-succes"
				@elseif ($trecker->treckEndLimit < date("H:m")) class="bg-danger"
				@endif
				>
					<td>{{ $trecker->dateTreck }}</td>
					<td>{{ $trecker->pseudo }}</td>
					<td>{{ $trecker->treckName }}</td>
					<td>{{ $trecker->timeTreck }}</td>
					<td>{{ $trecker->treckStart }}</td>
					<td>{{ $trecker->treckEnd }}</td>
					<td>{{ $trecker->treckEndLimit }}</td>
				</tr>
			@endforeach
	</div>
@endsection
