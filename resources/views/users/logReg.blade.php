@extends('layouts.home')
@section('content')
{{-- #####---Login Form---############################################################################## --}}
<div class = "row mt-5 ms-5">
    <div class="col-md-6">
        @if(session('success'))
            <p class="alert alert-danger">{{ session('success') }}</p>
        @endif
        @if($errors -> any())
            @foreach ($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
        @endif
        @if(session('error'))
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endif
        <form method="POST" action="{{ route('login.action') }}">
            @csrf
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="inputRegister" value="{{ old('inputRegister') }}" 
                placeholder="Pseudo or E-mail">
                <label for="floatingName">Pseudo or E-mail</label>
            </div>
            
            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
    
            <button class="btn btn-primary" type="submit">GoGo</button>
            {{-- <a class="btn btn-info" href = "{{ route('register') }}">Register</a> --}}
            <a class="btn btn-info" href = "{{ route('home') }}">Back</a>
        </form>
    </div>
</div>
{{-- #####---Register Form---############################################################################## --}}
<div class = "row my-5 ms-5">
    <div class="col-md-6">
        @if($errors -> any())
            @foreach ($errors -> all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
        @endif
        <form method="POST" action="{{ route('register.action') }}">
            @csrf
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="inputFirstName" id="floatingFirstName" value="{{ old('inputFirstName') }}" placeholder="First name">
                <label for="floatingFirstName">First Name</label>
            </div>
    
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="inputLastName" id="floatingLastName" value="{{ old('inputLastName') }}" placeholder="Last name">
                <label for="floatingLastName">Last Name</label>
            </div>
    
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="inputPseudo" id="floatingPseudo" value="{{ old('inputPseudo') }}" placeholder="Pseudo">
                <label for="floatingPseudo">Pseudo</label>
            </div>
            
            <div class="form-group form-floating mb-3">
                <input type="email" class="form-control" name="inputEmail" id="floatingEmail" value="{{ old('inputEmail') }}" placeholder="name@example.com">
                <label for="floatingEmail">Email address</label>
            </div>

            <div class="form-group form-floating mb-3">
                <input type="number" class="form-control" name="inputAge" id="floatingAge" value="{{ old('inputAge') }}" placeholder="Age">
                <label for="floatingAge">Age</label>
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="inputTel" id="floatingTel" value="{{ old('inputTel') }}" placeholder="Phone number">
                <label for="floatingTel">Phone number</label>
            </div>

            <div class="d-flex flex-column">
                <div class="d-flex flex-row ">
                    <div class="form-group form-floating mb-3 flex-fill">
                        <input type="text" class="form-control" name="inputContact1" id="floatingContact1" value="{{ old('inputContact1') }}" placeholder="Contact name 1">
                        <label for="floatingContact1">Contact name 1</label>
                    </div>
                    <div class="form-group form-floating mb-3 ms-3 flex-fill">
                        <input type="text" class="form-control" name="inputPhoneContact1" id="floatingPhoneContact1" value="{{ old('inputPhoneContact1') }}" placeholder="Phone number contact 1">
                        <label for="floatingPhoneContact1">Phone number contact 1</label>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="form-group form-floating mb-3 flex-fill">
                        <input type="text" class="form-control" name="inputContact2" id="floatingContact2" value="{{ old('inputContact2') }}" placeholder="Contact name 2">
                        <label for="floatingContact2">Contact name 2</label>
                    </div>
                    <div class="form-group form-floating mb-3 ms-3 flex-fill">
                        <input type="text" class="form-control" name="inputPhoneContact2" id="floatingPhoneContact2" value="{{ old('inputPhoneContact2') }}" placeholder="Phone number contact2">
                        <label for="floatingPhoneContact2">Phone number contact 2</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="inputPassword"  id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
    
            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" name="inputPassword_confirmation" id="floatingConfirmPassword" placeholder="Confirm Password">
                <label for="floatingConfirmPassword">Confirm Password</label>
            </div>
    
            <button class="btn btn-primary" type="submit">GoGo</button>
            <a class="btn btn-info" href = "{{ route('home') }}">Back</a>
        </form>
    </div>
</div>
@endsection