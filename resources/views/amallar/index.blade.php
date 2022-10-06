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
        <div class="modal fade" id="modalsotish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
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
                            <h1 class="text-center text-bg-light">Mahsulot sotish</h1>
                            <div class="container-fluid m-1">
                                <label for="" class="form-label">Qayerdan</label>
                                <select id="sotish_select" class="form-control" name="from">


                                    @foreach($shops as $shop )
                                        @if($shop->id<3)
                                            @continue
                                        @endif
                                        <option value="{{$shop->id}}">{{$shop->name}}</option>

                                    @endforeach
                                    <option value="0" selected>Tanlang</option>
                                </select>
                            </div>

                            <input type="hidden" name="to" value="2" class="form-control">

                            <div class="container-fluid m-1">
                                <label class="form-label">Mahsulotni tanlang</label>
                                <select id="sotish_select2" class="form-control" name="product">
                                    <option value="" selected disabled>Tanlang</option>
                                    @foreach($products as $product)

                                        <option value="{{$product->id}}">
                                            {{$product->name}}-{{$product->price}} So'm
                                        </option>

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


        <div class="modal fade" id="modalkochirish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
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
                                <select class="js-example-basic-single form-select ml-1" id="kochirish_select"
                                        name="from">
                                    <option value="" selected>Tanlang</option>
                                    @foreach($shops as $shop)
                                        @if($shop->id<=2)
                                            @continue
                                        @endif
                                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="container-fluid m-1">
                                <label for="" class="form-label">Qayerga</label>
                                <select class="js-example-basic-single form-select ml-1" name="to">
                                    <option value="" selected>Tanlang</option>
                                    @foreach($shops as $shop )
                                        @if($shop->id<=2)
                                            @continue
                                        @endif
                                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="container-fluid m-1">
                                <label for="" class="form-label mt-1">Mahsulot tanlang</label>
                                <select id="kochirish_select2" class="form-control" name="product">
                                    <option value="" selected>Tanlang</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}-{{$product->price}}So'm
                                        </option>
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


        <div class="modal fade" id="modalsotibolish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
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
                            <h1 class="text-center text-bg-light">Mahsulot sotib olish</h1>
                            <div class="container-fluid m-1">

                                <input type="hidden" name="from" value="1" class="form-control">
                            </div>
                            <div class="container-fluid m-1">
                                <label for="" class="form-label">Qayerga</label>
                                <select id="product1" class="js-example-basic-single form-select ml-1" name="to">
                                    <option value="" selected>Tanlang</option>
                                    @foreach($shops as $shop )
                                        @if($shop->id<=2)
                                            @continue
                                        @endif
                                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" value="no" id="is_new" name="is_new">
                            <div class="container-fluid m-1">
                                <label for="" class="form-label">Maxsulot tanlang</label>
                                <div class="d-flex">
                                    <select id="product1" class="js-example-basic-single form-select ml-1"
                                            name="product_id">
                                        <option value="" selected disabled>Tanlang</option>
                                        @foreach($products as $product )
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" onclick="showProduct()" class="btn btn-outline-success">
                                        Yaratish
                                    </button>
                                </div>
                            </div>


                            <div class="container-fluid m-1" id="p1" style="display: none">
                                <label class="form-label">Mahsulot nomi</label>
                                <input type="text" class="form-control" name="product_name">
                            </div>
                            <div class="container-fluid m-1" id="p2" style="display: none">
                                <label class="form-label">Mahsulot narxi</label>
                                <input type="text" class="form-control" name="product_price">
                            </div>
                            <div class="container-fluid m-1">
                                <label class="form-label">Mahsulot soni</label>
                                <input type="text" class="form-control" name="count">
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
@section('custom-js')
    <script>
        let tahlil =@json($tahlil);
        console.log(tahlil);
        $(document).ready(function () {


            $("#sotish_select").change(function () {
                var value = $(this).val();
                var tanlandi = tahlil[value];
                var options = '';
                var result = Object.keys(tanlandi).map((key) => [Number(key), tanlandi[key]]);
                console.log(result);
                var i = 0;
                for (i = 0; i < result.length - 1; i++) {
                    if (result[i][1]['count'] > 0) {
                        options += "<option value='" + result[i][1]['id'] + "'>" + result[i][1]['name'] + "</option>";

                    }
                }


                console.log(options);
                $("#sotish_select2").html(options);

            });
        });

        $(document).ready(function () {


            $("#kochirish_select").change(function () {
                var value = $(this).val();
                var tanlandi = tahlil[value];
                var options = '';
                var result = Object.keys(tanlandi).map((key) => [Number(key), tanlandi[key]]);
                console.log(result);
                var i = 0;
                for (i = 0; i < result.length - 1; i++) {
                    if (result[i][1]['count'] > 0) {
                        options += "<option value='" + result[i][1]['id'] + "'>" + result[i][1]['name'] + "</option>";

                    }
                }

                console.log(options);
                $("#kochirish_select2").html(options);

            });
        });


        document.getElementById('is_new').value = 'no';


        function showProduct() {

            document.getElementById('p1').style.display = 'block';
            document.getElementById('p2').style.display = 'block';
            document.getElementById('is_new').value = 'yes';
        }
    </script>
@endsection
