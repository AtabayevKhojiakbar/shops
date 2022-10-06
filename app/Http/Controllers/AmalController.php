<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class AmalController extends Controller
{
    public function index()
    {
        $tahlil = [];

        $shop = Shop::all();
        foreach ($shop as $sh) {
            $tahlil[$sh->id] = [];
            $tahlil[$sh->id]['data']['name'] = $sh->name;
            $tahlil[$sh->id]['data']['id'] = $sh->id;
        }
        $product = Product::all();
        for ($i = 0; $i < count($tahlil); $i++) {
            foreach ($product as $item) {
                $a = [];
                $a['id'] = $item->id;
                $a['name'] = $item->name;
                $a['count'] = 0;
                $tahlil[$i][$item->id] = $a;
            }
        }


        $data = history::all();
        foreach ($data as $d) {
            if ($d->from == 1) {
                $tahlil[$d->to][$d->product_id]['count'] += $d->count;
            } elseif ($d->to == 2) {
                $tahlil[$d->from][$d->product_id]['count'] -= $d->count;
            } else {
                $tahlil[$d->from][$d->product_id]['count'] -= $d->count;
                $tahlil[$d->to][$d->product_id]['count'] += $d->count;

            }

        }


        $tahlil = (object)$tahlil;
        return view('amallar.index', [
            'shops' => $shop,
            'products' => $product,
            'tahlil' => $tahlil
        ]);
    }

    public function addProduct(Request $request)
    {
        $productId = 0;
        if ($request->is_new == 'no') {
            $productId = $request->product_id;
        } else {
            $p = new Product();
            $p->name = $request->product_name;
            $p->price = $request->product_price;
            $p->save();
            $productId = $p->id;
        }
        $h = new history();
        $h->user_id = auth()->user()->id;
        $h->from = $request->from;
        $h->to = $request->to;
        $h->product_id = $productId;
        $pro = Product::find($productId);
        $h->price = $request->count * $pro->price;
        $h->count = $request->count;
        $h->status = "Sotib olindi";
        $h->save();
        return redirect()->route('amallar.index');

    }

    public function sellProduct(Request $request)
    {
//        dd($request);
        $count = 0;
        $id = $request->product;
        $product = Product::find($id);
        $history = new history();
        $history->count = $request->count;
        $history->product_id = $request->product;
        $history->price = $product->price;
        $history->status = "Sotildi";
        $history->from = $request->from;
        $history->to = $request->to;
        $history->save();
        return redirect()->route('history.index');
    }

    public function moveProduct(Request $request)
    {
        $count = Product::find($request->product);
        $history = new history();
        $history->count = $request->count;
        $history->product_id = $request->product;
        $history->status = 'Ko\'chirildi';
        $history->from = $request->from;
        $history->to = $request->to;
        $history->price = $count->price;
        $history->save();
        return redirect()->route('history.index');
    }

    public function kochirish()
    {
        $shop = Shop::all();
        $product = Product::all();
        return view('amallar.kochirish', [
            'shops' => $shop,
            'products' => $product
        ]);
    }

    public function sotib_olish()
    {
        $shop = Shop::all();
        $products = Product::all();
        return view('amallar.sotib_olish', [
            'shops' => $shop,
            'products' => $products
        ]);
    }

    public function sotish()
    {
        $shop = Shop::all();
        $product = Product::all();
        return view('amallar.sotish', [
            'shops' => $shop,
            'products' => $product
        ]);
    }

    public function delete($id)
    {
        $hisory = history::find($id);
        $hisory->deleted_at = now();
        $hisory->save();
        return redirect()->route('history.index');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->deleted_at = now();
        $product->save();
        return redirect()->route('products.index');
    }
}
