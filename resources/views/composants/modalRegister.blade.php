<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"
                style="color:white;">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                    <div class="d-flex btn-G-L">
                    <button class="btn btn-primary me-4" type="submit" data-bs-toggle="modal" data-bs-target="#modalLogin" style="width: 45%;">GoGo</button>
                    <button type="button" class="btn btn-light me-3" data-bs-toggle="modal" data-bs-target="#modalLogin" style="width: 45%;">
                        Login</button>
                </form>
            </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        
        </div>
    </div>
</div>