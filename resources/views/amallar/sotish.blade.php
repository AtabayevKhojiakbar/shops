@extends('amallar.index')
@section('amal')

    <div class="card">

        <form action="{{route('sellproduct')}}" method="post" class="form-control">
            @csrf
            <h1  class="text-center text-bg-light">Mahsulot sotish</h1>
            <div class="container-fluid m-1">
                <label for="" class="form-label">Qayerdan</label>
                <select id="product1" class="js-example-basic-single form-select ml-1" name="from" >
                    <option value="" selected disabled>Tanlang</option>
                    @foreach($shops as $shop )

                        <option>{{$shop->name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="container-fluid m-1">
                <label for="" class="form-label">Qayerga</label>
                <input type="text" name="to" required class="form-control">
            </div>
            <div class="container-fluid m-1">
                <label class="form-label">Mahsulotni tanlang</label>
                <select id="product1" class="form-control" name="product" >
                    <option value="" selected disabled>Tanlang</option>
                    @foreach($products as $product)
                        @if($product->count>0)
                        <option value="{{$product->id}}">{{$product->name}}-{{$product->price}} So'm  {{$product->count}} ta</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="container-fluid m-1">
                <label class="form-label">Mahsulot sonini kiriting</label>
                <input type="text" class="form-control" name="count" required>
            </div>
            <button  type="submit" class="btn btn-success" style="margin-left: 30px">Saqlash</button>
        </form>
    </div>
@endsection
