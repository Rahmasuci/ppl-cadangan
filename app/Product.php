<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = 'product';

    protected $fillable = [
    	'foto_produk',
    	'nama_produk',
    	'harga'
    ];

    public $timestamps = false;
    
}
