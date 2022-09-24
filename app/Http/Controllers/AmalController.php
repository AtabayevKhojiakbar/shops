<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class AmalController extends Controller
{
    public function index(){
        $shop = Shop::all();
        $product = Product::all();
        return view('amallar.index',[
            'shops'=>$shop,
            'products'=>$product
        ]);
    }
}
