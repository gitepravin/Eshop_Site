<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $fillable=[
        'prod_id',
        'name',
        'email',
        'mobile',	
        'status',
        'massege',
        'tracking_no',
        'product_detail',
    ];

    public function carts(){
        return $this->belongsTo(Cart::class,'prod_id','id');
    }

}
