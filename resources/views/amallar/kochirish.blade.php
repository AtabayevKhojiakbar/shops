@extends('amallar.index')
@section('amal')

    <div class="card">

        <form action="{{route('moveproduct')}}" method="post" class="form-control">
            @csrf
            <h1 align="center" class="text-center text-bg-light">Ko'chirish</h1>
            <div class="container-fluid m-1">
                <label for="" class="form-label">Qayerdan</label>
                <select class="js-example-basic-single form-select ml-1" name="from" >
                    <option value="" selected disabled>Tanlang</option>
                    @foreach($shops as $shop)
                        <option>{{$shop->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="container-fluid m-1">
                <label for="" class="form-label">Qayerga</label>
                <select  class="js-example-basic-single form-select ml-1"  name="to" >
                    <option value="" selected disabled>Tanlang</option>
                    @foreach($shops as $shop )
                        <option >{{$shop->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="container-fluid m-1">
                <label for="" class="form-label mt-1">Mahsulot tanlang</label>

                <select id="product1" class="form-control" name="product" >
                    <option value="" selected disabled>Tanlang</option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}-{{$product->price}} So'm</option>
                    @endforeach
                </select>
            </div>
            <button  type="submit" class="btn btn-success" style="margin-left: 30px">Saqlash</button>
        </form>
    </div>

    <script>
        function maxsulotAdd(){
            document.getElementById("product_input1").style.display='block';
            document.getElementById("product_input2").style.display='block';
        }
    </script>
@endsection
