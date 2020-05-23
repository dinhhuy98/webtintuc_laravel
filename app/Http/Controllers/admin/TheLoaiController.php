<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Http\Requests\CreateTheLoaiRequest;
use App\Http\Requests\EditTheLoaiRequest;
use Carbon\Carbon;
class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $theloai = TheLoai::all();
        $breadcrumb = array('Thể loại','Danh sách thể loại');
        return view('admin.theloai.index',['theloai'=>$theloai,
                                            'breadcrumb'=>$breadcrumb]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb = array('Thể loại','Thêm mới');
        return view('admin.theloai.create',[
                                            'breadcrumb'=>$breadcrumb]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTheLoaiRequest $request)
    {
          $theloai = new TheLoai;
          $theloai->Ten = $request->theloai;
          $theloai->TenKhongDau = Str::slug($request->theloai);
          $theloai->save();
          return redirect('admin/theloai/create')->with('mess','Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breadcrumb = array('Thể loại','Chỉnh sửa');
        $theloai = TheLoai::find($id);
        return view('admin.theloai.edit',[
                                        'breadcrumb'=>$breadcrumb,
                                        'theloai'=>$theloai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTheLoaiRequest $request, $id)
    {
        //
        $loaitin = TheLoai::find($id)->loaitin;
        $loaitin_delete = array();
        foreach($loaitin as $item){
            if(!in_array($item->id,$request->loaitin)){
                LoaiTin::find($item->id)->tintuc()->delete();
                LoaiTin::find($item->id)->delete();
            }
        }

        $theloai = TheLoai::find($id);
        $theloai->Ten = $request->theloai;
        $theloai->save();
        if(!$request->loaitin_moi==''){
            $loaitin = new LoaiTin;
            $loaitin->Ten = $request->loaitin_moi;
            $loaitin->TenKhongDau = Str::slug($request->loaitin_moi);
            $loaitin->id_theloai=$id;
            $loaitin->save();
        }
        return redirect('admin/theloai/'.$id.'/edit')->with('mess','Chỉnh sửa thành công');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaitin = TheLoai::find($id)->loaitin;
        //echo $loaitin->loaitin->Ten;
      //  $loaitin->tintuc;
        //TheLoai::find($id)->loaitin()->delete();
        //$loaitin->tintuc->delete();
        //$loaitin->delete();
        //TheLoai::find($id)->delete();
        foreach($loaitin as $item){
            $item->tintuc()->delete();
            $item->delete();
        }
    TheLoai::find($id)->delete();
     return redirect('admin/theloai');
    }

    public function getLoaiTinAjax($idTheLoai){
        $loaitin = LoaiTin::select('id','Ten')->where('id_theloai','=',$idTheLoai)->get();
        foreach ($loaitin as $item) {
            echo' <option value="'.$item->id.'" selected>'.$item->Ten.'</option>';
          
        }
       
    }
    public function test(){
      
        //echo $theloai->loaitin->id;
        echo Carbon::now()->month;
    }

   

   // public function getTheLoaiAjax(){
  //      $theloai = TheLoai::all();
   // }
}
