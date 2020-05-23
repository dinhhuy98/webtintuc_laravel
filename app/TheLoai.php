<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table="the_loai";

    public function loaitin(){
    	return $this->hasMany('App\LoaiTin','id_theloai','id');
    }

    public function tintuc(){
    	return $this->hasManyThrough('App\TinTuc','App\LoaiTin','id_theloai','id_loaitin','id');
    }
}
