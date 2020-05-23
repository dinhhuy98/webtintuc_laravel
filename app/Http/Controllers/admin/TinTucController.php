<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TinTuc;
use App\TheLoai;
use App\Http\Requests\CreateTinTucRequest;
use App\Http\Requests\EditTinTucRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tintuc  = TinTuc::orderBy('id','DESC')->paginate(15);
                $breadcrumb = array('Tin Tức','Danh sách tin tức');
        return view('admin.tintuc.index',['tintuc'=>$tintuc,
                                            'breadcrumb'=>$breadcrumb]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data=[];
        $data['theloai']=TheLoai::select('id','Ten')->get();
         $data['breadcrumb'] = array('Tin Tức','Thêm mới');
        return view('admin.tintuc.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTinTucRequest $request)
    {
        //
       // echo $request->theloai;
      //  echo $request->tieude;
      //  echo $request->loaitin;
        //echo $request->tomtat;
       $tintuc = new TinTuc;
       $tintuc->TieuDe = $request->tieude;
       $tintuc->TieuDeKhongDau = Str::slug($request->tieude);
       $tintuc->TomTat = $request->tomtat;
       $tintuc->NoiDung = $request->noidung;
       $tintuc->NoiBat = ($request->noibat==null)? 0:1;
       $tintuc->SoLuotXem=0;
       $tintuc->id_loaitin = $request->loaitin;
       $filename="";
       if($request->hasFile('image')){
            $file = $request->file('image');
            $filename =$file->getClientOriginalName();
            while(TinTuc::where('Hinh','=',$filename)->count()){
                $filename=Str::random(1).$name;
            }
            //$path = $file->storeAs('public/upload',$name);
            $file->move('public/upload/tintuc',$filename);
       }
        $tintuc->Hinh=$filename;
        $tintuc->save();
        return redirect('admin/tintuc/create')->with('mess','Thêm mới thành công');

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
        $data=[];
        $data['breadcrumb'] = array('Tin tức','Chỉnh sửa');
        $data['tintuc'] = TinTuc::find($id);
        $data['theloai']=TheLoai::select('id','Ten')->get();
        $data['loaitin'] = TinTuc::find($id)->loaitin->theloai->loaitin;
        $data['comment'] = TinTuc::find($id)->comment;
        return view('admin.tintuc.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTinTucRequest $request, $id)
    {
        //
        $tintuc = TinTuc::find($id);
        $tintuc->TieuDe = $request->tieude;
       $tintuc->TieuDeKhongDau = Str::slug($request->tieude);
       $tintuc->TomTat = $request->tomtat;
       $tintuc->NoiDung = $request->noidung;
       $tintuc->NoiBat = ($request->noibat==null)? 0:1;
       $tintuc->id_loaitin = $request->loaitin;
       if($request->hasFile('image')){
            $filename="";
            $file = $request->file('image');
            $filename =$file->getClientOriginalName();
            while(TinTuc::where('Hinh','=',$filename)->count()){
                $filename=Str::random(1).$name;
            }
            //$path = $file->storeAs('public/upload',$name);
            $file->move('public/upload/tintuc',$filename);
            $tintuc->Hinh=$filename;
       }
        $tintuc->save();
        return redirect('admin/tintuc/'.$tintuc->id.'/edit')->with('mess','Chỉnh sửa thành công');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment = TinTuc::find($id)->comment;
        foreach ($comment as $value) {
            $value->delete();
        }
        TinTuc::find($id)->delete();
        return redirect('admin/tintuc');
    }

    public function search(Request $request){
        $data=array();
        $key = $request->q;
        $data['tintuc']  = TinTuc::where('TieuDe','like',"%$key%")->orWhere('TomTat','like',"%$key%")->paginate(15);
        $data['search_query'] = $request->q;
        $data['tintuc']->appends(['search'=>$request->q]);
         $data['breadcrumb'] = array('Tin Tức','Tìm kiếm');

        return view('admin.tintuc.search',$data);
    }

}
