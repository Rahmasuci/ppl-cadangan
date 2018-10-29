<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';

    protected $fillable = [
    	'kuantitas',
    	'total',
    	'id_order',
    	'id_produk',
    ];

    public function order(){
        return $this->belongsTo('App\Order', 'id_order');    
    }

    public function product(){
		return $this->belongsTo('App\Product', 'id_produk');
    }

    public function penawaran(){
        return $this->hasMany('App\Penawaran', 'id_penawaran');
    }
   
   
}
