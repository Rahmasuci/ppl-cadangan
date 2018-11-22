<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    protected $table = 'penawaran';

    protected $fillable = [
    	'qty_butuh',
    	'hrg_max',
    	'status',
    	'id_detail',
    	'id_pengajuan'
    ];

    public function orderdetail(){
		return $this->belongsTo('App\OrderDetail', 'id_detail');
	} 

    public function pengajuan(){
        return $this->hasMany('App\Pengajuan', 'id_pengajuan');
    } 

}
