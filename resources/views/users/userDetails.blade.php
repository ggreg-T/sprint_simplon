@extends('layouts.home')
@section('content')
    <div class="row my-5 ms-5 px-5">
        <div class="col-md-6 ms-5">
            @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
            @endif
            <form method="POST" action="{{ route('changeUserInfos.action') }}">
                @csrf
                <div class="form-group form-floating mb-3">
                    <input id="floatingfirstName" type="text" class="form-control" name="inputFirstName"
                        value="{{ $user[0]->firstName }}" @if (Auth::user()->id != $user[0]->id) readonly @endif>
                    <label for="floatingfirstName">First Name</label>
                </div>

                <div class="form-group form-floating mb-3">
                    <input id="floatinglastName" type="text" class="form-control" name="inputLastName"
                        value="{{ $user[0]->lastName }}" @if (Auth::user()->id != $user[0]->id) readonly @endif>
                    <label for="floatinglastName">Last Name</label>
                </div>

                <div class="form-group form-floating mb-3">
                    <input id="floatingpseudo" type="text" class="form-control" name="inputPseudo"
                        value="{{ $user[0]->pseudo }}" @if (Auth::user()->id != $user[0]->id) readonly @endif>
                    <label for="floatingpseudo">Pseudo</label>
                </div>

                <div class="form-group form-floating mb-3">
                    <input id="floatingTel" type="text" class="form-control" name="inputTel"
                        value="{{ $user[0]->phone }}" @if (Auth::user()->id != $user[0]->id) readonly @endif>
                    <label for="floatingTel">Phone</label>
                </div>

                <div class="form-group form-floating mb-3">
                    <input id="floatingAge" type="number" class="form-control" name="inputAge"
                        value="{{ $user[0]->age }}" @if (Auth::user()->id != $user[0]->id) readonly @endif>
                    <label for="floatingAge">Age</label>
                </div>

                <div class="form-group form-floating mb-3">
                    <input id="floatingEmail" type="email" class="form-control" name="inputEmail"
                        value="{{ $user[0]->email }}" @if (Auth::user()->id != $user[0]->id) readonly @endif>
                    <label for="floatingEmail">Email address</label>
                </div>

                <div class="d-flex flex-row">
                    <div class="form-group form-floating mb-3 me-3 flex-fill">
                        <input id="floatingEmail1" type="text" class="form-control" name="inputContact1"
                            value="{{ $user[0]->contact1 }}" @if (Auth::user()->id != $user[0]->id) readonly @endif>
                        <label for="floatingEmail1">Contact Urgence 1</label>
                    </div>
                    <div class="form-group form-floating mb-3">
                        <input id="floatingtel1" type="text" class="form-control" name="inputPhoneContact1"
                            value="{{ $user[0]->phone1 }}" @if (Auth::user()->id != $user[0]->id) readonly @endif>
                        <label for="floatingtel1">Tel Urgence 1</label>
                    </div>
                </div>

                <div class="d-flex flex-row">
                    <div class="form-group form-floating mb-3 me-3 flex-fill">
                        <input id="floatingEmail2" type="text" class="form-control" name="inputContact2"
                            value="{{ $user[0]->contact2 }}" @if (Auth::user()->id != $user[0]->id) readonly @endif>
                        <label for="floatingEmail2">Contact Urgence 2</label>
                    </div>
                    <div class="form-group form-floating mb-3">
                        <input id="floatingtel2" type="text" class="form-control" name="inputPhoneContact2"
                            value="{{ $user[0]->phone2 }}" @if (Auth::user()->id != $user[0]->id) readonly @endif>
                        <label for="floatingtel2">Tel Urgence 2</label>
                    </div>
                </div>

                @if (Auth::user()->id == $user[0]->id)
                    <div class="form-group form-floating mb-3">
                        <input id="floatingPassword" type="password" class="form-control" name="inputOld_password"
                            placeholder="Password">
                        <label for="floatingPassword">actuel Password</label>
                    </div>
                    <div class="form-group form-floating mb-3">
                        <input id="floatingPasswordNew" type="password" class="form-control" name="inputNew_password"
                            placeholder="Password">
                        <label for="floatingPasswordNew">new Password</label>
                    </div>
                    <div class="form-group form-floating mb-3">
                        <input id="floatingConfirmPassword" type="password" class="form-control"
                            name="inputNew_password_confirmation" placeholder="Confirm Password">
                        <label for="floatingConfirmPassword">Confirm new Password</label>
                    </div>
                @endif

                <div class="form-group form-floating d-flex flex-row mb-3">
                    @if (Auth::user()->id == $user[0]->id)
                        <div class="form-group form-floatingd-flex flex-fill me-2">
                            <input id="floatingConfirmPassword" type="submit" class="btn btn-info form-control"
                                value="Valide Changes">
                        </div>
                    @endif

                    @if (Auth::user()->operator == 1 || Auth::user()->admin == 1)
                        <div class="form-group form-floating d-flex flex-fill">
                            <a class="btn btn-info text-nowrap flex-fill" href="{{ route('users') }}">Users List</a>
                        </div>
                    @endif
                    <div class="form-group form-floating ms-2 d-flex flex-fill">
                        <a class="btn btn-info text-nowrap flex-fill" href="{{ route('home') }}">Home</a>
                    </div>
                </div>
                @if (Auth::user()->operator == 1 || Auth::user()->admin == 1)
                    <div class="form-group form-floating mb-3 d-flex flex-fill">
                        <a class="btn btn-info text-nowrap flex-fill" href="{{ route('watchTreckers') }}">Back Watch
                            Treckers</a>
                    </div>
                @endif
            </form>
            @if (Auth::user()->admin == 1)
                <form method="POST" action="{{ route('updateStatus', $user[0]->id) }}">
                    <div class="d-flex flex-row mb-3">
                        @csrf
                        <div class="form-group form-floating flex-fill d-flex">
                            @if ($user[0]->admin == 0 && $user[0]->operator == 0)
                                <input id="floatingStatusUser" type="text" class="form-control me-3" value="User" readonly>
                            @elseif ($user[0]->operator == 1)
                                <input id="floatingStatusUser" type="text" class="form-control me-3" value="Operateur"
                                    readonly>
                            @elseif ($user[0]->admin == 1)
                                <input id="floatingStatusUser" type="text" class="form-control me-3" value="Administrator"
                                    readonly>
                            @endif
                            <label for="floatingStatusUser" class="text-nowrap">Status User</label>

                        </div>
                        <select name="inputUserStatus" class="form-select me-3">
                            <option value="selectUser">User</option>
                            <option value="selectOpera">Operator</option>
                            <option value="selectAdmin">Administrator</option>
                        </select>
                        <div class="form-group form-floating flex-fill d-flex">
                            <button type="submit" class="btn btn-success text-nowrap flex-fill">Change Status</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
