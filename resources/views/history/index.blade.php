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
                <th>Create time</th>
                <th>Delete time</th>
                <th>Amal</th>
            </tr>
            @foreach($histories as $history)
            <tr align="center">
                <th>{{$history->id}}</th>
                <th>{{$history->users->name}}</th>
                <th>{{$history->form}}</th>
                <th>{{$history->to}}</th>
                <th>{{$history->product->name}}</th>
                <th>{{$history->product->price*$history->count}}</th>
                <th>{{$history->created_at}}</th>
                <th>{{$history->delete_at}}</th>
                <th>
                    <a class="btn btn-warning" href="{{route('history.edit',$history->id)}}"><i class="fas fa-pen"></i></a>
                    <a class="btn btn-danger" href=""><i class="fas fa-archive"></i></a>
                </th>
            </tr>
            @endforeach
        </table>
    </div>

@endsection
