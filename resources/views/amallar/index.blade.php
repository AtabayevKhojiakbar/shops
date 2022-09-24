@extends('.dashboard')
@section('content')

<div class="card">
    <form action="{{route('addproduct')}}" method="post" class="form-control">
        @csrf
    <div class="container-fluid m-1">
        <label for="" class="form-label">Qayerdan</label>
        <select class="js-example-basic-single form-select ml-1" name="from" >
            <option value="" selected disabled>Tanlang</option>
            <option value="" >Tanlang</option>
            <option value="" >Tanng</option>
            @foreach($shops as $shop)
            <option value="{{$shop->id}}">{{$shop->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="container-fluid m-1">
        <label for="" class="form-label">Qayerga</label>
        <select class="js-example-basic-single form-select ml-1" name="to" >
            <option value="" selected disabled>Tanlang</option>
            @foreach($shops as $shop )
            <option value="{{$shop->id}}">{{$shop->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="container-fluid m-1">
    <label for="" class="form-label mt-1">Mahsulot tanlang</label>
        <div class="d-flex">
    <select id="product1" class="form-control" name="product" >
        <option value="" selected disabled>Tanlang</option>
        @foreach($products as $product)
        <option value="{{$product->id}}">{{$product->name}}-{{$product->price}} So'm</option>
        @endforeach
    </select>
            <a  onclick="maxsulotAdd()" class="btn btn-primary">Maxsulot qo'shish</a>
        </div>
        <input type="text" id="product_input1" name="product_name" class="form-control" style="display: none" placeholder="Maxsulot nomini kiriting:">
        <input type="text" id="product_input2" name="product_price" class="form-control" style="display: none" placeholder="Maxsulot narxini kiriting:">
    </div>
        <button  type="submit" class="btn btn-success m-1 hover:bg-gray-50">Saqlash</button>
    </form>
</div>

<script>
    function maxsulotAdd(){
        document.getElementById("product_input1").style.display='block';
        document.getElementById("product_input2").style.display='block';
    }
</script>
@endsection
