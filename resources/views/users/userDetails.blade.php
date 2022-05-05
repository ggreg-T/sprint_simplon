@extends('layouts.home')
@section('content')
<div class = "row my-5 ms-5">
    <div class="col-md-6 ms-5">
        @if(session('success'))
            <p class = "alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors -> any())
            @foreach ($errors -> all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
        @endif
        <form method="POST" action="{{ route('changeUserInfos.action') }}">
            @csrf
            <div class="form-group form-floating mb-3">
                <input id="floatingfirstName" type="text" class="form-control" name="inputFirstName" value="{{ $user[0]->firstName }}">
                <label for="floatingfirstName">First Name</label>
            </div>
    
            <div class="form-group form-floating mb-3">
                <input id="floatinglastName" type="text" class="form-control" name="inputLastName" value="{{ $user[0]->lastName }}" >
                <label for="floatinglastName">Last Name</label>
            </div>
    
            <div class="form-group form-floating mb-3">
                <input id="floatingpseudo" type="text" class="form-control" name="inputPseudo" value="{{ $user[0]->pseudo }}">
                <label for="floatingpseudo">Pseudo</label>
            </div>

            <div class="form-group form-floating mb-3">
                <input id="floatingTel" type="text" class="form-control" name="inputTel" value="{{ $user[0]->phone }}">
                <label for="floatingTel">Phone</label>
            </div>

            <div class="form-group form-floating mb-3">
                <input id="floatingAge" type="number" class="form-control" name="inputAge" value="{{ $user[0]->age }}">
                <label for="floatingAge">Age</label>
            </div>
            
            <div class="form-group form-floating mb-3">
                <input id="floatingEmail" type="email" class="form-control" name="inputEmail" value="{{ $user[0]->email }}" >
                <label for="floatingEmail">Email address</label>
            </div>

            <div class="d-flex flex-row">
                <div class="form-group form-floating mb-3 me-3 flex-fill">
                    <input id="floatingEmail1" type="text" class="form-control" name="inputContact1" value="{{ $user[0]->contact1 }}" >
                    <label for="floatingEmail1">Contact Urgence 1</label>
                </div>
                <div class="form-group form-floating mb-3">
                    <input id="floatingtel1" type="text" class="form-control" name="inputPhoneContact1" value="{{ $user[0]->phone1 }}" >
                    <label for="floatingtel1">Tel Urgence 1</label>
                </div>
            </div>
            
            <div class="d-flex flex-row">
                <div class="form-group form-floating mb-3 me-3 flex-fill">
                    <input id="floatingEmail2" type="text" class="form-control" name="inputContact2" value="{{ $user[0]->contact2 }}" >
                    <label for="floatingEmail2">Contact Urgence 2</label>
                </div>
                <div class="form-group form-floating mb-3">
                    <input id="floatingtel2" type="text" class="form-control" name="inputPhoneContact2" value="{{ $user[0]->phone2 }}" >
                    <label for="floatingtel2">Tel Urgence 2</label>
                </div>
            </div>

            <div class="form-group form-floating mb-3">
                <input id="floatingPassword" type="password" class="form-control" name="inputOld_password" placeholder="Password">
                <label for="floatingPassword">actuel Password</label>
            </div>

            <div class="form-group form-floating mb-3">
                <input id="floatingPasswordNew" type="password" class="form-control" name="inputNew_password" placeholder="Password">
                <label for="floatingPasswordNew">new Password</label>
            </div>
    
            <div class="form-group form-floating mb-3">
                <input id="floatingConfirmPassword" type="password" class="form-control" name="inputNew_password_confirmation" placeholder="Confirm Password">
                <label for="floatingConfirmPassword">Confirm new Password</label>
            </div>

            <div class="form-group form-floating d-flex flex-row">
                <div class="form-group form-floating mb-3">
                    <input id="floatingConfirmPassword" type="submit" class="form-control" value="Valide Changes">
                </div>
                <div class="form-group form-floating mb-3">
                    <a class="btn btn-info" href = "{{ route('users') }}">Back</a>
                </div>
            </div>
        </form>
        @if (Auth::user()->admin == 1)
            <form method="POST" action="{{ route('updateStatus', $user[0]->id) }}">
                @csrf
                <div class="d-flex flex-row">
                    <div class="form-group form-floating mb-3 me-3 flex-fill">
                        <input id="floatingOperateur" type="text" class="form-control" name="inputOperator" value="{{ $user[0]->operator }}">
                        <label for="floatingOperateur">Status Operator</label>
                    </div>
                    <div class="form-group form-floating mb-3 me-3 flex-fill">
                        <input id="floatingAdmin" type="text" class="form-control" name="inputAdmin" value="{{ $user[0]->admin }}">
                        <label for="floatingAdmin">Status Admin</label>
                    </div>
                    <div class="form-group form-floating mb-3 flex-fill d-flex align-items-center">
                        <input type="submit" class="form-control" value="Change Status">
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
@endsection