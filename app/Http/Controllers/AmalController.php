<?php

namespace App\Http\Controllers;

use App\Models\history;
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
        $all = Product::all();
        if(!isset($all[$request->product_name])) {
            $pro = new Product();
            $pro->name = $request->product_name;
            $pro->price = $request->product_price;
            $count = $pro->count;
            $count += $request->count;
            $pro->count = $count;
            $pro->save();
            $history = new history();
            $history->from = $request->from;
            $history->to = $request->to;
            $history->product_id = $pro->id;
            $history->price = $request->count * $request->product_price;
            $history->status = 'Sotib olindi';
            $history->count = $request->count;
            $history->save();
            return redirect()->route('history.index');
//        $productId=$pro->id;
//            dd($count);
        }else{
            $pro = Product::find($request->product_name);
            $pro->count = $pro->count + $request->count;
            $pro->price = $request->product_price;
            $pro->save();
            $history = new history();
            $history->from = $request->from;
            $history->to = $request->to;
            $history->product_id = $pro->id;
            $history->price = $request->count * $request->product_price;
            $history->status = 'Sotib olindi';
            $history->count = $request->count;
            $history->save();
            return redirect()->route('history.index');
        }
    }
    public function sellProduct(Request $request){
//        dd($request->product);
        $count = 0;
        $id = $request->product;
        $product = Product::find($id);
        $count = $product->count - $request->count;
        $product->count = $count;
        $product->save();
        $history = new history();
        $history->count = $request->count;
        $history->product_id = $request->product;
        $history->price = $request->count * $product->price;
        $history->status = "Sotildi";
        $history->from = $request->from;
        $history->to = $request->to;
        $history->save();
        return redirect()->route('history.index');
    }
    public function moveProduct(Request $request){
        $count = Product::find($request->product);
        $history = new history();
        $history->count = $count->count;
        $history->product_id = $request->product;
        $history->status = 'Ko\'chirildi';
        $history->from = $request->from;
        $history->to = $request->to;
        $history->save();
        return redirect()->route('history.index');
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
    public function sotish(){
        $shop = Shop::all();
        $product = Product::where('deleted_at', '=', null)->get();
        return view('amallar.sotish',[
            'shops'=>$shop,
            'products'=>$product
        ]);
    }
    public function delete($id){
        $hisory = history::find($id);
        $hisory->deleted_at = now();
        $hisory->save();
        return redirect()->route('history.index');
    }
    public function deleteProduct($id){
        $product = Product::find($id);
        $product->deleted_at = now();
        $product->save();
        return redirect()->route('products.index');
    }
}
