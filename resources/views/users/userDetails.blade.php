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
                <input id="floatingfirstName" type="text" class="form-control" name="firstName" value="{{ Auth::user() ->firstName }}">
                <label for="floatingfirstName">First Name</label>
            </div>
    
            <div class="form-group form-floating mb-3">
                <input id="floatinglastName" type="text" class="form-control" name="lastName" value="{{ Auth::user() ->lastName }}" >
                <label for="floatinglastName">Last Name</label>
            </div>
    
            <div class="form-group form-floating mb-3">
                <input id="floatingpseudo" type="text" class="form-control" name="phone" value="{{ Auth::user() ->phone }}">
                <label for="floatingpseudo">Pseudo</label>
            </div>

            <div class="form-group form-floating mb-3">
                <input id="floatingpseudo" type="text" class="form-control" name="tel" value="{{ Auth::user() ->pseudo }}">
                <label for="floatingpseudo">Pseudo</label>
            </div>
            
            <div class="form-group form-floating mb-3">
                <input id="floatingEmail" type="email" class="form-control" name="email" value="{{ Auth::user() ->email }}" >
                <label for="floatingEmail">Email address</label>
            </div>

            <div class="d-flex flex-row">
                <div class="form-group form-floating mb-3 me-3 flex-fill">
                    <input id="floatingEmail1" type="text" class="form-control" name="name1" value="{{ Auth::user() ->contact1 }}" >
                    <label for="floatingEmail1">Contact Urgence 1</label>
                </div>
                <div class="form-group form-floating mb-3">
                    <input id="floatingtel1" type="text" class="form-control" name="tel1" value="{{ Auth::user() ->phone1 }}" >
                    <label for="floatingtel1">Tel Urgence 1</label>
                </div>
            </div>
            
            <div class="d-flex flex-row">
                <div class="form-group form-floating mb-3 me-3 flex-fill">
                    <input id="floatingEmail2" type="text" class="form-control" name="name2" value="{{ Auth::user() ->contact2 }}" >
                    <label for="floatingEmail2">Contact Urgence 2</label>
                </div>
                <div class="form-group form-floating mb-3">
                    <input id="floatingtel2" type="text" class="form-control" name="tel2" value="{{ Auth::user() ->phone2 }}" >
                    <label for="floatingtel2">Tel Urgence 2</label>
                </div>
            </div>

            <div class="form-group form-floating mb-3">
                <input id="floatingPassword" type="password" class="form-control" name="old_password" placeholder="Password">
                <label for="floatingPassword">actuel Password</label>
            </div>

            <div class="form-group form-floating mb-3">
                <input id="floatingPasswordNew" type="password" class="form-control" name="new_password" placeholder="Password">
                <label for="floatingPasswordNew">new Password</label>
            </div>
    
            <div class="form-group form-floating mb-3">
                <input id="floatingConfirmPassword" type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm Password">
                <label for="floatingConfirmPassword">Confirm new Password</label>
            </div>

            @auth
                @if(Auth::user()->operateur == 1 || Auth::user()->admin == 1)
                    <div class="d-flex flex-row">
                        <div class="form-group form-floating mb-3">
                            <input id="floatingOperateur" type="text" class="form-control" name="operateur" value="{{ Auth::user() ->operateur }}" >
                            <label for="floatingOperateur">Status Operateur</label>
                        </div>
                        @if (Auth::user()->admin == 1)
                            <div class="form-group form-floating mb-3">
                                <input id="floatingAdmin" type="text" class="form-control" name="admin" value="{{ Auth::user() ->admin }}" >
                                <label for="floatingAdmin">Status Admin</label>
                            </div>
                        @endif
                    </div>
                @endif
            @endauth
    
            <button class="btn btn-primary" type="submit">Go Changes</button>
            {{-- <a class="btn btn-info" href = "#">Login</a> --}}
            <a class="btn btn-info" href = "{{ route('home') }}">Back</a>
        </form>
    </div>
</div>
@endsection