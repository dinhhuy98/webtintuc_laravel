<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    //
    protected $table="tin_tuc";

    public function loaitin(){
    	return $this->belongsTo('App\LoaiTin','id_loaitin','id');
    }

    public function comment(){
    	return $this->hasMany('App\Comment','id_tintuc','id');
    }
}
