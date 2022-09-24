@extends('.dashboard')
@section('content')

    <div class="card">
        <form action="{{route('shop.update',$shop->id)}}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="from" class="form-control" required value="{{$shop->name}}">
            <input type="text" name="to" class="form-control" required value="{{$shop->location}}">
            <button class="btn btn-success" type="submit">Saqlash</button>
        </form>
    </div>

@endsection
