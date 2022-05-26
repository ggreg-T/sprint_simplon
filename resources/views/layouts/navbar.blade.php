<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark px-md-5 vert_foncé">
        <div class="d-flex justify-content-around">
            <div class="d-flex flex-row">
                <a class="me-3" href="{{ route('home') }}"><img
                        style="width:100%; height:50px;" src="{{ URL::asset('img/treckingsecurLogo.png') }}"
                        alt="not found"> </a>
            </div>

            <div class="d-flex flex- ">
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <a class="dropdown-item"
                        href="{{ route('getlistTrecks', ['location' => 'Reunion', 'filter' => 'all']) }}">Réunion</a>
                </div>

            </div>
            <div>
                <form class="ms-5 me-5" action="{{ route('searchTreck') }}" method="GET">
                    @csrf
                    <div class="input-group ">
                        <input class="form-control me-1 mt-2" name="inputSearchTreck" placeholder="Search Treck..."
                            aria-label="Search Treck...">
                        <button class="btn btn-outline-success ms-1 mt-2" type="submit">🔎</button>
                    </div>
                </form>
            </div>
            <div class="d-flex flex-row position-absolute top-0 end-0 me-5  mt-2">

                @auth
                    <div class="mt-2">
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
                            <li class="list-inline-item"><a class="dropdown-item " style="color:#a2a2a2"
                                    href="{{ route('listUserTrecksView') }}">Your Trecks</a></li>
                            <li class="list-inline-item"><a class="dropdown-item " style="color:#a2a2a2"
                                    href="{{ route('userTrecksView') }}">Dashbord</a></li>
                            <li class="list-inline-item"><a class="dropdown-item " style="color:#a2a2a2"
                                    href="{{ route('user.edit', Auth::user()->id) }}">Personal informations</a></li>
                            <li class="list-inline-item"><a class="dropdown-item " style="color:#a2a2a2"
                                    href="{{ route('addTrecks') }}">TreckCreator</a></li>
                            @auth
                                @if (Auth::user()->operator == 1 || Auth::user()->admin == 1)
                                    <li class="list-inline-item">
                                        <a class="dropdown-item" style="color:#a2a2a2" href="{{ route('users') }}">Users</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="dropdown-item" style="color:#a2a2a2" href="{{ route('watchTreckers') }}">watch Treckers</a>
                                    </li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                    <a class="btn text-white me-5 mt-2" href="{{ route('logout') }}">Logout</a>
                @endauth
                @guest

                    <button type="button" class="btn text-white me-3 mt-2 " data-bs-toggle="modal"
                        data-bs-target="#modalLogin">
                        Login</button>
                    <button type="button" class="btn text-white me-3 mt-2" data-bs-toggle="modal"
                        data-bs-target="#modalRegister">
                        Register</button>
                @endguest
            </div>
        </div>
    </nav>
</div>
@include('composants.modalLogin')
@include('composants.modalRegister')
@include('composants.modalChoice')
