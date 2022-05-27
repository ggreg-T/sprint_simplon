@extends('layouts.home')
@section('content')
    <div class="px-5">
        <div class="mt-4">
            <div class="mb-4">
                <div class="pull-left mb-4">
                    <h2>{{ $title }}</h2>
                </div>
                <div class="d-flex flex-row">
                    <div>
                        <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data">Back</a>
                    </div>
                    <div>
                        {{-- <form class="d-flex me-5" action="{{ route('searchTreck') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input class="form-control me-2" name="inputSearchTreck" placeholder="Search Treck..." aria-label="Search Treck...">
                            <button class="btn btn-outline-success ms-2" type="submit">🔎</button>
                        </div>
                    </form> --}}
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($error = Session::get('error'))
                <div class="alert alert-warning">
                    <p>{{ $error }}</p>
                </div>
            @endif
            <div>
                <div>
                    <h2>Your Trip</h2>
                </div>
                <table class="table table-bordered">
                    @if (count($treckRoad) == 0)
                        <div class="alert alert-success">
                            <p>There's no Trip engaged yet</p>
                        </div>
                    @endif

                    @foreach ($treckRoad as $treck)
                        <tr class="bg-success">
                            <td>
                                <form action="{{ route('detailTrek', $treck->id) }}" method="get">
                                    <input type="text" class="visually-hidden" name="inputTreckId"
                                        value="{{ $treck->id }}" readonly>
                                    <input type="submit" class="form-control me-2 btn bg-info" name="inputDetailUser"
                                        value="{{ $treck->treckName }}" readonly>
                                </form>
                            </td>
                            <td><img style="width: 5rem; height: 3rem" src="{{ Storage::url($treck->img) }}" 
                                    alt={{ URL::asset('img/treckingsecurLogo.png') }}></td>
                            <td>{{ $treck->dateTreck }}</td>
                            <td>{{ $treck->treckStart }}</td>
                            <td>{{ $treck->treckEnd }}</td>
                            <td>{{ $treck->treckEndLimit }}</td>
                            <td class="">
                                <form action="{{ route('endTreck', $treck->id) }}" method="Post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('You closed the trip {{ $treck->treckName }} ?');">Confirm
                                        End</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div>
                <div>
                    <h2>Your reservations</h2>
                </div>
                <table class="table table-bordered">
                    @if (count($treckResa) == 0)
                        <div class="alert alert-success">
                            <p>You've no reservatons yet</p>
                        </div>
                    @endif

                    @foreach ($treckResa as $treck)
                        <tr class="">
                            <td>
                                <form action="{{ route('detailTrek', $treck->id) }}" method="get">
                                    <input type="text" class="visually-hidden" name="inputTreckId"
                                        value="{{ $treck->id }}" readonly>
                                    <input type="submit" class="form-control me-2 btn bg-info" name="inputDetailUser"
                                        value="{{ $treck->treckName }}" readonly>
                                </form>
                            </td>
                            <td><img style="width: 5rem; height: 3rem" src="{{ Storage::url($treck->img) }}"
                                    alt="{{ $treck->name }}"></td>
                            <td>{{ $treck->dateTreck }}</td>
                            <td>{{ $treck->treckStart }}</td>
                            <td>{{ $treck->treckEnd }}</td>
                            <td>{{ $treck->treckEndLimit }}</td>
                            <td class="d-flex flex-row flex-fill">
                                <form class="flex-fill" action="{{ route('goTreck', $treck->id) }}" method="POST">
                                    @csrf
                                    <input name="inputTimeTreck" class="visually-hidden" value="{{ $treck->timeTreck }}"
                                        readonly>
                                    <input name="inputTimeTampon" class="visually-hidden"
                                        value="{{ $treck->timeTampon }}" readonly>
                                    <button type="submit" class="btn btn-success"
                                        onclick="return confirm('You wanna start your trip {{ $treck->treckName }} ?');">Start
                                        Trip</button>
                                </form>
                                <form class="flex-fill" action="{{ route('destroyResa', $treck->id) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('You wanna cancel your trip {{ $treck->treckName }} ?');">Cancel
                                        Trip</button>
                                </form>
                                {{-- <a href="{{ route('destroyResa', $treck->id) }}" type="submit" class="btn btn-danger" onclick="return confirm('You wanna start your trip {{ $treck->treckName }} ?');">Cancel Trip link</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div>
                <div>
                    <h2>Your Trecks done</h2>
                </div>
                <table class="table table-bordered">
                    @if (count($treckDone) == 0)
                        <div class="alert alert-success">
                            <p>You've no trecks done yet</p>
                        </div>
                    @endif

                    @foreach ($treckDone as $treck)
                        <tr class="bg-secondary">
                            <td>
                                <form action="{{ route('detailTrek', $treck->id) }}" method="get">
                                    <input type="text" class="visually-hidden" name="inputTreckId"
                                        value="{{ $treck->id }}" readonly>
                                    <input type="submit" class="form-control me-2 btn bg-info" name="inputDetailUser"
                                        value="{{ $treck->treckName }}" readonly>
                                </form>
                            </td>
                            <td><img style="width: 5rem; height: 3rem" src="{{ Storage::url($treck->img) }}"
                                    alt="{{ $treck->name }}"></td>
                            <td>{{ $treck->location }}</td>
                            <td>{{ $treck->dateTreck }}</td>
                            <td>{{ $treck->treckStart }}</td>
                            <td>{{ $treck->treckEnd }}</td>
                            <td>{{ $treck->treckEndLimit }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
