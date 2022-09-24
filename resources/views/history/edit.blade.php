@extends('dashboard')
@section('content')

    <div class="card">
        <form action="{{route('history.update',$history->id)}}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="from" class="form-control" required value="{{$history->from}}">
            <input type="text" name="to" class="form-control" required value="{{$history->to}}">
            <button class="btn btn-success" type="submit">Saqlash</button>
        </form>
    </div>

@endsection
