@extends('dashboard')
@section('content')

    <div class="card container-fluid">
        <table class="table table-bordered border-1 mt-3">
            <tr align="center">
                <th>#</th>
                <th>Nomi</th>
                <th>Narxi</th>
                <th>Yangilangan sana</th>
                <th>Amal</th>
            </tr>
            @foreach($products as $product)
            <tr align="center">
                <th>{{$product->id}}</th>
                <th>{{$product->name}}</th>
                <th>{{$product->price}}</th>
                <th>{{$product->updated_at}}</th>
                <th>
                    <div class="d-flex">
                    <a class="btn btn-warning m-1" href="{{route('products.edit',$product->id)}}"><i class="fas fa-pen"></i></a>
                    <form action="{{route('productdelete',$product->id)}}" method="post">
                        @csrf
                        <button class="btn btn-danger m-1" ><i class="fas fa-archive"></i></button>
                    </form>
                </th>
            </tr>
            @endforeach
        </table>
    </div>

@endsection
