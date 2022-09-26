@extends('amallar.index')
@section('amal')

    <div class="card">

        <form action="{{route('addproduct')}}" method="post" class="form-control">
            @csrf
            <h1  class="text-center text-bg-light">Sotib olish</h1>
            <div class="container-fluid m-1">
                <label for="" class="form-label">Qayerdan</label>
                <input type="text" name="from" required class="form-control">
            </div>
            <div class="container-fluid m-1">
                <label for="" class="form-label">Qayerga</label>
                <select id="product1" class="js-example-basic-single form-select ml-1" name="to" >
                    <option value="" selected disabled>Tanlang</option>
                    @foreach($shops as $shop )
                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="container-fluid m-1">
                <label class="form-label">Mahsulot nomi</label>
                <input type="text" class="form-control" name="product_name" required>
            </div>
            <div class="container-fluid m-1">
                <label class="form-label">Mahsulot soni</label>
                <input type="text" class="form-control" name="count" required>
            </div>
            <div class="container-fluid m-1">
                <label class="form-label">Mahsulot narxi</label>
                <input type="text" class="form-control" name="product_price" required>
            </div>
            <button  type="submit" class="btn btn-success" style="margin-left: 30px">Saqlash</button>
        </form>
    </div>
@endsection
