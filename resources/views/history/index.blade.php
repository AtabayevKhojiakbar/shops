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
            </tr>
            @foreach($histories as $history)
                <tr align="center">
                    <th>{{$history->id}}</th>
                    <th>{{$history->users->name}}</th>
                    <th>{{$history->froms->name}}</th>
                    <th>{{$history->tos->name}}</th>
                    <th>{{$history->product->name}}</th>
                    <th>{{$history->product->price}}</th>
                    <th>{{$history->count}}</th>
                    <th>{{$history->status}}</th>
                    <th>{{$history->created_at}}</th>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
