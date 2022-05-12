
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark   px-md-5 "style="background-color:#a8eb44"> 
            <div class="container-fluid ps-md-0">
                <div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="navbar-brand" href="{{route('home')}}"><img style="height:50px; width:90px;"src="{{URL::asset('img/logo2.png')}}" alt="Logo"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle navbar-brand text-white ms-3" href="#" id="listTrecks"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Trecks
                                    </a>
                                    <ul class="dropdown-menu ms-4 px-4 bg-info" aria-labelledby="listTrecks">
                                        <li class="list-inline-item"><a class="dropdown-item" href="{{ route('getlistTrecks', 'all') }}">Réunion</a></li>
                                        <li class="list-inline-item"><a class="dropdown-item" href="{{ route('getlistTrecks', 'north') }}">North Réunion</a></li>
                                        <li class="list-inline-item"><a class="dropdown-item" href="{{ route('getlistTrecks', 'east') }}">East Réunion</a></li>
                                        <li class="list-inline-item"><a class="dropdown-item" href="{{ route('getlistTrecks', 'south') }}">South Réunion</a></li>
                                        <li class="list-inline-item"><a class="dropdown-item" href="{{ route('getlistTrecks', 'west') }}">West Réunion</a></li>
                                    </ul>
                                </li>
                                @auth
                                    @if (Auth::user()->operator == 1 || Auth::user()->admin == 1)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('users')}}">Users</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('watchTreckers')}}">watch Treckers</a>
                                        </li>
                                    @endif
                                    @if (Auth::user()->admin == 1)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('addTrecks')}}">add Trecks</a>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <form class="d-flex me-5" action="{{ route('searchTreck') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input class="form-control me-2" name="inputSearchTreck" placeholder="Search Treck..." aria-label="Search Treck...">
                            <button class="btn btn-outline-success ms-2" type="submit">🔎</button>
                        </div>
                    </form>
                </div>
                <div class="d-flex flex-row">
                    {{-- <form class="d-flex me-3" action="{{ route('search') }}" method="GET">
                        @csrf
                        <div class="input-group d-flex flex-nowrap">
                            <input class="form-control me-1" name="inputSearchMovie" placeholder="Search..."
                                aria-label="Search...">
                            <button class="btn btn-outline-success ms-1" type="submit">🔎</button>
                        </div>
                    </form> --}}
                    @auth
                        <div class="btn-group">
                            <a class="nav-link dropdown-toggle text-white ms-3" href="#" id="userPages"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <b>@if (Auth::user()->admin == 1) 👑 
                                @elseif (Auth::user()->operator == 1) 🎧 
                                @endif
                                {{ Auth::user()->pseudo }}</b>
                            </a>
                                <ul class="dropdown-menu ms-5 px-4 bg-info" aria-labelledby="userPages"><li class="nav-item">
                                    <li class="list-inline-item"><a class="dropdown-item" href="{{ route('listUserTrecksView') }}">Your Trecks</a></li>
                                    <li class="list-inline-item"><a class="dropdown-item" href="{{ route('userTrecksView') }}">Dashbord</a></li>
                                    <li class="list-inline-item"><a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}">Personal informations</a></li>
                                    <li class="list-inline-item"><a class="dropdown-item" href="{{ route('addTrecks') }}">TreckCreator</a></li>
                                </ul>
                        </div>
                        <a class="btn btn-danger me-3" href="{{ route('logout') }}">Logout</a>
                    @endauth
                    @guest
                        <a class="btn btn-primary mx-3" href="#"><b>Visitor</b></a>
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
