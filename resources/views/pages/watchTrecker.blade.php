@extends('layouts.home')
@section('content')
	<h2 class="mt-5">{{ $title }}</h2>

	<div class="my-5">
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
				@if (date("H:i") >= $trecker->treckEndLimit && $trecker->dateTreck == date("Y-m-d")) class="bg-danger"
				@elseif (date("H:i") >= $trecker->treckEnd && $trecker->dateTreck == date("Y-m-d")) class="bg-warning"
				@elseif ($trecker->treckStandBy == false) class="bg-success" @endif
				
				
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
