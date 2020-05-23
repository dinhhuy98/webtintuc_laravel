<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
class TestController extends Controller
{
    //
    public function index(){
   		$theloai = TheLoai::all();
   		foreach ($theloai as $value) {
   			echo $value->Ten.":";
   			foreach ($value->loaitin as $loaitin) {
   				echo $loaitin->Ten;
   			}
   		
   			echo "<br>";
   		}
    }
}
