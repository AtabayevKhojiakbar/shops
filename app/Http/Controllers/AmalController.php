<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class AmalController extends Controller
{
    public function index(){
        return view('amallar.index');
    }
    public function addProduct(Request $request){
        $productId=0;
        $pro=new Product();
        $pro->name=$request->product_name;
        $pro->price=$request->product_price;
        $pro->save();
        $productId=$pro->id;
        dd($productId);
    }
    public function kochirish(){
        $shop = Shop::all();
        $product = Product::all();
        return view('amallar.kochirish',[
            'shops'=>$shop,
            'products'=>$product
        ]);
    }
    public function sotib_olish(){
        $shop = Shop::all();
        return view('amallar.sotib_olish',[
            'shops'=>$shop
        ]);
    }
}
