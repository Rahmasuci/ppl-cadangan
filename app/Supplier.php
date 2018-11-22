<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';

	protected $fillable = [
		'nama_supplier',
		'alamat',
		'no_hp',
		'nama_kebun',
		'alamat_kebun',
		'id_user',
	];

	 public function pengajuan(){
        return $this->hasMany('App\pengajuan', 'id_pengajuan');
    }
}
