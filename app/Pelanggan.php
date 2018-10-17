<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
	protected $table = 'pelanggan';

	protected $fillable = [
		'nama',
		'alamat',
		'nohp',
		'jenis_kelamin',
	];

	public function order(){
		return $this->hasMany('App\Order', 'id_order');
	}
}
