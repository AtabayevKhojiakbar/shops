@extends('dashboard')
@section('content')

    <div class="card">
        <form action="{{route('products.update',$product->id)}}" method="post">
            @csrf
            @method('PUT')
            <input type="text" name="name" class="form-control" required value="{{$product->name}}">
            <input type="text" name="price" class="form-control" required value="{{$product->price}}">
            <button class="btn btn-success" type="submit">Saqlash</button>
        </form>
    </div>

@endsection
