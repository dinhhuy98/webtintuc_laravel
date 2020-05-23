<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    //
    protected $table="loai_tin";

    public function theloai(){
    	return $this->belongsTo('App\TheLoai','id_theloai','id');
    }

    public function tintuc(){
    	return $this->hasMany('App\TinTuc','id_loaitin','id');
    }
}
