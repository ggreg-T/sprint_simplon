<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex flex-column">
                <h5 class="modal-title" id="exampleModalLabel-login">Login</h5>
                </div>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                </form>
            </div>
                <button type="button" class="btn btn-light me-3" data-bs-toggle="modal" data-bs-target="#modalRegister">
                    Register</button>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>