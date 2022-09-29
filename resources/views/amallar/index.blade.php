@extends('.dashboard')
@section('content')
<div>

{{--        <a class="m-3 nav-link {{  request()->routeIs('amallar.sotish') ? 'active' : '' }}" href="{{route('amallar.sotish')}}"><span> Sotish</span></a>--}}
{{--        <a class="m-3 nav-link {{  request()->routeIs('amallar.sotib_olish') ? 'active' : '' }}" href="{{route('amallar.sotib_olish')}}"><span> Sotib olish</span></a>--}}
{{--        <a class="m-3 nav-link {{  request()->routeIs('amallar.kochirish') ? 'active' : '' }}" href="{{route('amallar.kochirish')}}"><span> Ko'chirish</span></a>--}}

    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalsotish">
            Mahsulot sotish
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalkochirish">
            Mahsulot kochirish
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalsotibolish">
            Mahsulot sotib olish
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalsotish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('sellproduct')}}" method="post" class="form-control">
                            @csrf
                            <h1  class="text-center text-bg-light">Mahsulot sotish</h1>
                            <div class="container-fluid m-1">
                                <label for="" class="form-label">Qayerdan</label>
                                <select id="product1" class="form-control" name="from" >
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="modalkochirish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mahsulot ko'chirish</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('moveproduct')}}" method="post" class="form-control">
                        @csrf
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
                        <div class="container-fluid m-1">
                            <label for="" class="form-label mt-1">Mahsulot sonini kiriting</label>
                            <input type="text" class="form-control" required name="count">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
        <div class="modal fade" id="modalsotibolish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mahsulot sotib olish</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('addproduct')}}" method="post" class="form-control">
                        @csrf
                        <h1  class="text-center text-bg-light">Mahsulot sotib olish</h1>
                        <div class="container-fluid m-1">
                            <label for="" class="form-label">Qayerdan</label>
                            <input type="text" name="from" required class="form-control">
                        </div>
                        <div class="container-fluid m-1">
                            <label for="" class="form-label">Qayerga</label>
                            <select id="product1" class="js-example-basic-single form-select ml-1" name="to" >
                                <option value="" selected disabled>Tanlang</option>
                                @foreach($shops as $shop )
                                    <option>{{$shop->name}}</option>
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="container-fluid">
{{--        @yield('amal')--}}
    </div>
</div>


@endsection
