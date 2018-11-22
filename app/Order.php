<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';

	protected $fillable = [
		'alamat_pengiriman', 
		'tgl_pesan', 
		'batas_pengiriman', 
		'tgl_kirim', 
		'tgl_selesai', 
		'id_pelanggan',
		'status',
		'bukti_pembayaran'
	];

	public $timestamp = true;

	public function pelanggan(){
		return $this->belongsTo('App\Pelanggan', 'id_pelanggan');
	}

	public function orderdetail(){
		return $this->hasMany('App\OrderDetail', 'id_order');
	}

	
}
