<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class history extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'from',
        'to',
        'product_id',
        'price',
        'count'
        ];
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function froms(){
        return $this->belongsTo(Shop::class,'from','id');
    }
    public function tos(){
        return $this->belongsTo(Shop::class,'to','id');
    }

}
