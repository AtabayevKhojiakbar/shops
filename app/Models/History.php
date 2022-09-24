<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function shopFrom(){
        return $this->belongsTo(Shop::class,'from','id');
    }

    public function shopTo(){
        return $this->belongsTo(Shop::class,'to','id');
    }
}