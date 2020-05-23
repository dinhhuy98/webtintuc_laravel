<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table="comments";

    public function tintuc(){
    	return $this->belongsTo('App\TinTuc','id_tintuc','id');
    }

    public function user(){
    	return $this->belongsTo('App\User','id_user','id');
    }
}
