@extends('dashboard')
@section('content')

    <div class="card container-fluid">
        <table class="table table-bordered border-1 mt-3">
            <tr align="center">
                <th>#</th>
                <th>Nomi</th>
                <th>Narxi</th>
                <th>Yangilangan sana</th>
                <th>O'chirilgan sana</th>
                <th>Amal</th>
            </tr>
            @foreach($products as $product)
            <tr align="center">
                <th>{{$product->id}}</th>
                <th>{{$product->name}}</th>
                <th>{{$product->price}}</th>
                <th>{{$product->updated_at}}</th>
                <th>{{$product->delete_at}}</th>
                <th>
                    <a class="btn btn-warning" href="{{route('products.edit',$product->id)}}"><i class="fas fa-pen"></i></a>
                    <a class="btn btn-danger" href=""><i class="fas fa-archive"></i></a>
                </th>
            </tr>
            @endforeach
        </table>
    </div>

@endsection
