<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
           'name'=>'Kontragent',
           'location'=>'nomalum'
        ]);
        Shop::create(
            [
                'name'=>'Xaridor',
                'location'=>'nomalum'
            ]);
        Shop::create(
            [
                'name'=>'testshop',
                'location'=>'nomalum'
            ]);
    }
}
