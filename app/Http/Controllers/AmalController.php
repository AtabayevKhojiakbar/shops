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
    public function addProduct(Request $request){
        $productId=0;
        if($request->product_name != null){
            $pro=new Product();
            $pro->name=$request->product_name;
            $pro->price=$request->product_price;
            $pro->save();
            $productId=$pro->id;
        }else{
            $productId=$request->product;
        }
        dd($productId);
    }
}
