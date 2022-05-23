@extends('layouts.home')
@section('content')
    <div class="px-5">
        <meta http-equiv="refresh" content="10">
        <div>
            <h2 class="mt-5">{{ $titleMain }}</h2>
            <div class="d-flex flex-row">
                <h2 class="">{{ $titleTime }}</h2>
                <a type="button" class="btn  ms-3 btnhover" href="">Reload</a>
            </div>

        </div>


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
                        @if (date('H:i') >= $trecker->treckEndLimit || date('Y-m-d') > $trecker->dateTreck) class="bg-danger"
				@elseif (date('H:i') >= $trecker->treckEnd && $trecker->dateTreck == date('Y-m-d')) class="bg-warning"
				@elseif ($trecker->treckStandBy == false) class="bg-success" 
				@else class="" @endif>
                        <td>{{ $trecker->dateTreck }}</td>
                        <td>
                            <div class="d-flex">
                                <a type="button" class="btn btn-info flex-fill"
                                    href="{{ route('user.edit', $trecker->idUser) }}">{{ $trecker->pseudo }}</a>
                            </div>
                        </td>
                        <td @if ($trecker->private == true) class="bg-dark" @endif>
                            <div class="d-flex">
                                <a type="button" class="btn btn-info flex-fill"
                                    href="{{ route('userPosi', $trecker->treckId) }}">{{ $trecker->treckName }}</a>
                            </div>
                        </td>
                        <td>{{ $trecker->timeTreck }}</td>
                        <td>{{ $trecker->treckStart }}</td>
                        <td>{{ $trecker->treckEnd }}</td>
                        <td>{{ $trecker->treckEndLimit }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
