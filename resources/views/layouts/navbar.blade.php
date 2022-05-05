
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-info px-md-5 ">
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
                        <a class="navbar-brand" href="{{route('home')}}">Home</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('home')}}">Your Trek</a>
                                </li>
                                @auth
                                    @if (Auth::user()->operator == 1 || Auth::user()->admin == 1)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('users')}}">Users</a>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                        </div>
                    </div>
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
                        <a class="btn btn-primary ms-3 me-3 text-nowrap" href="{{ route('user.edit', Auth::user()->id) }}">
                            <b>@if (Auth::user()->admin == 1) 👑 
                                @elseif (Auth::user()->operator == 1) 🎧 
                                @endif
                                {{ Auth::user()->pseudo }}</b>
                        </a>
                        <a class="btn btn-danger me-3" href="{{ route('logout') }}">Logout</a>
                    @endauth
                    @guest
                        <a class="btn btn-primary mx-3" href="{{ route('logReg') }}"><b>Visitor</b></a>
                        <a class="btn btn-primary me-3" href="{{ route('logReg') }}">Login</a>
                        <a class="btn btn-info me-3" href="{{ route('logReg') }}">Register</a>
                    @endguest
                </div>
            </div>
        </nav>
    </div>
