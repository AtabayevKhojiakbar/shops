<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class HisobotController extends Controller
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
                $a['from'] = 0;
                $a['to'] = 0;
                $a['price'] = $item->price;
                $tahlil[$i][$item->id] = $a;
            }
        }

        $data = history::all();
        foreach ($data as $d) {
            if ($d->to > 2) {
                $tahlil[$d->to][$d->product_id]['from'] += $d->count;
            }
            if ($d->from > 2) {
                $tahlil[$d->from][$d->product_id]['to'] += $d->count;
            }
        }
        $t = (object)$tahlil;
//dd($tahlil);
        return view('hisobot.index', [
            'tahlil' => $tahlil,
            'shops' => $shop,
            'products' => $product
        ]);
    }
}
