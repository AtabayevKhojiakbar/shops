@extends('.dashboard')
@section('content')

    <div class="card container-fluid">
        <table class="table table-bordered border-1 mt-3">
            <tr align="center">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created</th>
                <th>Amal</th>
            </tr>
            @foreach($users as $user)
            <tr align="center">
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <a class="btn btn-warning" href=""><i class="fas fa-pen"></i></a>
                    <a class="btn btn-danger" href=""><i class="fas fa-archive"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection
