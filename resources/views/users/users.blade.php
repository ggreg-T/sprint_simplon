@extends('layouts.home')
@section('content')
    <div class="container mt-5">
        <div class="row pt-4 mb-4">
            <div class="pull-left">
                <h2>User List</h2>
            </div>
            <div class="d-flex flex-row">
                <div >
                    <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data">Back</a>
                </div>
                <div>
                    <form class="d-flex me-5" action="{{ route('searchUser') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input class="form-control me-2" name="inputSearchUser" placeholder="Search User..." aria-label="Search User...">
                            <button class="btn btn-outline-success ms-2" type="submit">🔎</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Pseudo</th>
                <th>E-mail</th>
                <th>Phone</th>
                <th>Contact 1 Name</th>
                <th>Contact 1 Tel</th>
                <th>Contact 2 Name</th>
                <th>Contact 2 Tel</th>
                <th>Created at</th>
                <th>Operator</th>
                <th>Admin</th>
                <th>Id</th>
                <th width="280px">Action</th> 
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user ->firstName }}</td>
                <td>{{ $user ->lastName }}</td>
                <td>{{ $user ->age }}</td>
                <td>
                    <form action="{{ route('user.edit', $user->id) }}" method="get">
                        <input type="text" class="visually-hidden" 
                                name="inputUserId"
                                value = "{{ $user->id }}" readonly>
                        <input type="submit" class="form-control me-2 btn btn-info"  
                                name="inputDetailUser" 
                                value = "{{ $user->pseudo }}" readonly>
                    </form>
                </td>
                <td>{{ $user ->email }}</td>
                <td>{{ $user ->phone }}</td>
                <td>{{ $user ->contact1 }}</td>
                <td>{{ $user ->phone1 }}</td>
                <td>{{ $user ->contact2 }}</td>
                <td>{{ $user ->phone2 }}</td>
                <td>{{ \Carbon\Carbon::parse($user->created_at)->locale('nl')->format('d/m/Y H:i:s') }}</td> 
                <td>{{ $user ->operator }}</td>
                <td>{{ $user ->admin }}</td>
                <td>{{ $user ->id }}</td>
                <td class="">
                    <form action="{{ route('user.destroy', $user->id) }}" method="Post"> 
                        @csrf 
                        @method('DELETE') 
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sur to delete {{ $user->pseudo }} ?');">Delete</button> 
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection