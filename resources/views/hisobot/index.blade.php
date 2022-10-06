@extends('dashboard')
@section('content')

    <div class="card p-4">
        @foreach($tahlil as $key=>$ms)
            @if($key<3)
                @continue
            @endif
            @foreach($shops as $shop)
                @if($shop->id==$key)
                    <h1 align="center" class="mt-2">{{$shop->name}}</h1>
                @endif
            @endforeach
            <table class="table table-bordered">
                <tr>
                    <th>Mahsulot nomi</th>
                    <th>Qolgan mahsulot soni</th>
                    <th>Mahsulot narxi</th>
                    <th>Mahsulotning umumiy narxi</th>
                </tr>
                @php
                    $from=0;
                    $to=0;
                    $p=0;
                    $sum1=0;
                    $sum2=0;
                @endphp
                @foreach($ms as $ky=>$as)

                    @if($ky == 'data')
                        @continue
                    @elseif($as['from']-$as['to']!=0)
                        @php
                            $from+=$as['from'];
                            $p+=1;
                            $to+=$as['to'];
                            $sum1+=$as['from']*$as['price'];
                            $sum2+=$as['to']*$as['price'];
                        @endphp

                        <tr>
                            <th>{{$as['name']}}</th>
                            <th>{{$as['from']-$as['to']}}</th>
                            <th>{{number_format($as['price'],0, ' ', ' ')}} So'm</th>
                            <th>{{number_format($as['price']*($as['from']-$as['to']),0 ,' ', ' ')}} So'm</th>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <th>Mahsulot turlari</th>
                    <th>Qolgan mahsulotlar soni</th>
                    <th>Sotib olingan mahsulot soni</th>
                    <th>Sotilgan mahsulot soni</th>
                    <th>Sotib olingan mahsulotlar summasi</th>
                    <th>Sotilgan mahsulotlar summasi</th>
                </tr>
                <tr align="center">
                    <th>{{$p}}</th>
                    <th>{{$from-$to}}</th>
                    <th> {{$from}}</th>
                    <th>{{$to}}</th>
                    <th>{{number_format($sum1,0,' ', ' ')}} So'm</th>
                    <th>{{number_format($sum2,0,' ',' ')}} So'm</th>
                </tr>
            </table>
        @endforeach
    </div>

@endsection
