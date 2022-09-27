@extends('.dashboard')
@section('content')

    <div class="card container-fluid">
        <table class="table table-bordered border-1 mt-3">
            <tr align="center">
                <th>#</th>
                <th>User</th>
                <th>From</th>
                <th>To</th>
                <th>Product</th>
                <th>Price</th>
                <th>Count</th>
                <th>Status</th>
                <th>Create time</th>
                <th>Delete time</th>
                <th>Amal</th>
            </tr>
            @foreach($histories as $history)
            <tr align="center">
                <th>{{$history->id}}</th>
                <th>{{$history->users->name}}</th>
                <th>{{$history->from}}</th>
                <th>{{$history->to}}</th>
                <th>{{$history->product->name}}</th>
                <th>{{$history->product->price*$history->count}}</th>
                <th>{{$history->count}}</th>
                <th>{{$history->status}}</th>
                <th>{{$history->created_at}}</th>
                <th>{{$history->deleted_at}}</th>
                <th><div class="d-flex">
                        <a class="btn btn-warning m-1" href="{{route('history.edit',$history->id)}}"><i class="fas fa-pen"></i></a>
                        <form action="{{route('historydelete',$history->id)}}" method="post">
                            @csrf
                            <button class="btn btn-danger m-1" ><i class="fas fa-archive"></i></button>
                        </form>
                    </div>
                </th>
            </tr>
            @endforeach
        </table>
    </div>

@endsection
