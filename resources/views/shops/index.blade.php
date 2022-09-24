@extends('dashboard')
@section('content')

    <div class="card container-fluid">
        <h1 align="center">Do'konlar</h1>
        <table class="table table-bordered border-1 mt-3">
            <tr align="center">
                <th>#</th>
                <th>Nomi</th>
                <th>Manzil</th>
                <th>Sana</th>
                <th>Amal</th>
            </tr>
            @foreach($shops as $shop)
            <tr align="center">
                <th>{{$shop->id}}</th>
                <th>{{$shop->name}}</th>
                <th>{{$shop->location}}</th>
                <th>{{$shop->updated_at}}</th>
                <th>
                    <a class="btn btn-warning" href="{{route('shop.edit',$shop->id)}}"><i class="fas fa-pen"></i></a>
                    <a class="btn btn-danger" href=""><i class="fas fa-archive"></i></a></th>
            </tr>
            @endforeach
        </table>
    </div>

@endsection
