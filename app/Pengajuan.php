<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $fillable = [
    	'qty',
    	'hrg',
    	'status',
    	'id_penawaran',
    	'id_supplier',
    	'file_pembayaran'
    ];

    public function penawaran(){
		return $this->belongsTo('App\Penawaran', 'id_penawaran');
	}

    public function supplier(){
        return $this->belongsTo('App\Supplier', 'id_supplier');
    }

    // public function orderdetail(){
    //     return $this->hasOne('App\OrderDetail', 'id_orderdetail');
    // }

	

}
