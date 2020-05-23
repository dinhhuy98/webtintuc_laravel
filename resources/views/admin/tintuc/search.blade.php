@extends('admin.layouts.master1')

@section('content')
<div class="container-fluid">
  <!-- Breadcrumbs-->
  @include('admin.blocks.breadcrumb')
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Kết quả tìm kiếm cho '{{$search_query}}' - {{$tintuc->total()}} kết quả
      
      <div class="float-right">
        <form class="form-inline my-2 my-lg-0 mr-lg-2" method="POST" action="{{route('tintuc.search')}}">
           @csrf
          <div class="input-group">
           
             
            <input class="form-control" type="text" name="search_query">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive text-center">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr >
              <th style="width:3%" class="align-middle">ID</th>
              <th style="width:40%" class="align-middle">Tiêu đề</th>
              <th style="width:10%" class="align-middle">Thể loại/ Loại tin</th>
              <th style="width:8%" class="align-middle">Số lượt xem</th>
              <th style="width:8%" class="align-middle">Số bình luận</th>
              <th style="width:10%" class="align-middle">Chỉnh sửa</th>
              <th style="width:10%" class="align-middle">Xóa</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tintuc as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td><div><p style="display: inline-block;width: 46%;">{{$item->TieuDe}}</p>
                <img style="display: inline-block;vertical-align: top;width: 46%;height: 100px" src="public/upload/tintuc/{{$item->Hinh}}" style="width:100px;"></div></td>
                
                <td>{{$item->loaitin->theloai->Ten}}/{{$item->loaitin->Ten}}</td>
                <td>{{$item->SoLuotXem}}</td>
                <td>{{$item->comment->count()}}</td>
                <td><a href="{{route('tintuc.edit',['tintuc'=>$item->id])}}" class="text-decoration-none btn btn-warning"><i class="fa fa-edit"></i>Edit</a></td>
                <td>
                  <form action="{{route('tintuc.destroy',['tintuc'=>$item->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</button>
                  </form></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="float-right">
              {{$tintuc->appends(Request::all())->links()}}
            </div>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>


    @endsection