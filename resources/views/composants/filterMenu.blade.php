{{-- not used for now !!!!! --}}

<div class="d-flex dropdown-hover-all">
    <div class="dropdown">
        <button class="btn btn-Dark text-white dropdown-toggle" type="button" id="dropdownMenuButton222" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Trecks
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton222">
            <div class="dropdown dropend">
                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts-all" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Réunion</a>
                <div class="dropdown-menu" aria-labelledby="dropdown-layouts-all">

                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "Reunion", 'filter' => 'all']) }}">aall ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "Reunion", 'filter' => 'hardDESC']) }}">aHard ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "Reunion", 'filter' => 'hardASC']) }}">aEasy --</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "Reunion", 'filter' => 'distDESC']) }}">aDistance ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "Reunion", 'filter' => 'distASC']) }}">aDistance --</a>
                </div>
            </div> 

            <div class="dropdown dropend">
                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts-north" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Réunion North</a>
                <div class="dropdown-menu" aria-labelledby="dropdown-layouts-north">
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "north", 'filter' => 'all']) }}">nall ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "north", 'filter' => 'hardDESC']) }}">nHard ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "north", 'filter' => 'hardASC']) }}">nEasy --</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "north", 'filter' => 'distDESC']) }}">nDistance ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "north", 'filter' => 'distASC']) }}">nDistance --</a>
                </div>
            </div>

            <div class="dropdown dropend">
                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts-south" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Réunion South</a>
                <div class="dropdown-menu" aria-labelledby="dropdown-layouts-south">
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "south", 'filter' => 'all']) }}">sall ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "south", 'filter' => 'hardDESC']) }}">sHard ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "south", 'filter' => 'hardASC']) }}">sEasy --</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "south", 'filter' => 'distDESC']) }}">sDistance ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "south", 'filter' => 'distASC']) }}">sDistance --</a>
                </div>
            </div>

            <div class="dropdown dropend">
                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts-west" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Réunion West</a>
                <div class="dropdown-menu" aria-labelledby="dropdown-layouts-west">
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "west", 'filter' => 'all']) }}">wall ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "west", 'filter' => 'hardDESC']) }}">wHard ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "west", 'filter' => 'hardASC']) }}">wEasy --</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "west", 'filter' => 'distDESC']) }}">wDistance ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "west", 'filter' => 'distASC']) }}">wDistance --</a>
                </div>
            </div>

            <div class="dropdown dropend">
                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts-east" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Réunion East</a>
                <div class="dropdown-menu" aria-labelledby="dropdown-layouts-east">
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "east", 'filter' => 'all']) }}">eall ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "east", 'filter' => 'harddesc']) }}">eHard ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "east", 'filter' => 'hardASC']) }}">eEasy --</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "east", 'filter' => 'distDESC']) }}">eDistance ++</a>
                    <a class="dropdown-item" href="{{ route('getlistTrecks', ['location' => "east", 'filter' => 'distASC']) }}">eDistance --</a>
                </div>
            </div>
        </div>
    </div>
</div>
