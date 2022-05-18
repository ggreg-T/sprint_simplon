<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark   px-md-5 " style="background-color:#1A1F16">
        <div class=" d-flex justify-content-around">

            <div class="d-flex flex-row ">

                <a class="me-3" href="{{ route('home') }}" enctype="multipart/form-data"><img
                        style="width:100%; height:50px;" src="{{ URL::asset('img/treckingsecurLogo.png') }}"
                        alt="not found"> </a>
            </div>
            <div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 " style="--bs-scroll-height: 100px;">
                        {{-- <li class="nav-item dropdown"> --}}
                        <li class="nav-item">
                            @include('composants.filterMenu')
                        </li>
                        @auth
                            @if (Auth::user()->operator == 1 || Auth::user()->admin == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users') }}">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('watchTreckers') }}">watch Treckers</a>
                                </li>
                            @endif
                            @if (Auth::user()->admin == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('addTrecks') }}">add Trecks</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>

            </div>
            <div class="">
                <form class="ms-5 me-5" action="{{ route('searchTreck') }}" method="GET">
                    @csrf
                    <div class="input-group ">
                        <input class="form-control me-1" name="inputSearchTreck" placeholder="Search Treck..."
                            aria-label="Search Treck...">
                        <button class="btn btn-outline-success ms-1" type="submit">🔎</button>
                    </div>
                </form>
            </div>
            <div class="d-flex flex-row position-absolute top-0 end-0 me-5  mt-2">

                @auth
                    <div class="btn-group">
                        <a class="nav-link dropdown-toggle text-white ms-3" href="#" id="userPages" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <b>
                                @if (Auth::user()->admin == 1)
                                    👑
                                @elseif (Auth::user()->operator == 1)
                                    🎧
                                @endif
                                {{ Auth::user()->pseudo }}
                            </b>
                        </a>
                        <ul class="dropdown-menu ms-5 px-4 " style="background-color:black;" aria-labelledby="userPages">
                            <li class="nav-item">
                            <li class="list-inline-item"><a class="dropdown-item " style="color:#a2a2a2"
                                    href="{{ route('listUserTrecksView') }}">Your Trecks</a></li>
                            <li class="list-inline-item"><a class="dropdown-item " style="color:#a2a2a2"
                                    href="{{ route('userTrecksView') }}">Dashbord</a></li>
                            <li class="list-inline-item"><a class="dropdown-item " style="color:#a2a2a2"
                                    href="{{ route('user.edit', Auth::user()->id) }}">Personal informations</a></li>
                            <li class="list-inline-item"><a class="dropdown-item " style="color:#a2a2a2"
                                    href="{{ route('addTrecks') }}">TreckCreator</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-danger me-3" href="{{ route('logout') }}">Logout</a>
                @endauth
                @guest
                
                    <button type="button" class="btn btn-light me-3" data-bs-toggle="modal" data-bs-target="#modalLogin">
                        Login</button>
                    <button type="button" class="btn btn-light me-3" data-bs-toggle="modal" data-bs-target="#modalRegister">
                        Register</button>
                @endguest
            </div>
        </div>
    </nav>
</div>
@include('composants.modalLogin')
@include('composants.modalRegister')
