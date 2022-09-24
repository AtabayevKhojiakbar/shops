@extends('.dashboard')
@section('content')

<div class="card">
    <form action="" method="post" class="form-control">
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
    <select class="js-example-basic-single form-select ml-1" name="product" >
        <option value="" selected disabled>Tanlang</option>
        @foreach($products as $product)
        <option value="{{$product->id}}">{{$product->name}}-{{$product->price}} So'm</option>
        @endforeach
    </select>
    </div>
    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or  tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endsection
