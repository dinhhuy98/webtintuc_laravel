@extends('admin.layouts.master1')

@section('content')
<div class="container-fluid">
      <!-- Breadcrumbs-->
    @include('admin.blocks.breadcrumb')
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Danh sách thể loại
          <a href="{{route('theloai.create')}}"><button type="button" class="btn btn-primary">Thêm thể loại</button></a>
        <div class="float-right">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
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
                <tr>
                  <th style="width:3%">ID</th>
                  <th>Tên</th>
                  <th>Tên Không dấu</th>
                  <th style="width:30%">Loại tin</th>
                  <th style="width:15%">Chỉnh sửa</th>
                  <th style="width:8%">Xóa</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($theloai as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->Ten}}</td>
                  <td>{{$item->TenKhongDau}}</td>
                  <td>@foreach($item->loaitin as $loaitin)
                  		{{$loaitin->Ten}};
						@endforeach
                  </td>
                  <td><a href="{{route('theloai.edit',['theloai'=>$item->id])}}" class="text-decoration-none btn btn-warning"><i class="fa fa-edit"></i> Edit</a></td>
                  <td>
                    <form action="{{route('theloai.destroy',['theloai'=>$item->id])}}" method="POST">
                      @csrf
                      @method('DELETE')

                    <button type="submit" class="text-decoration-none btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</button>
                  </form></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>


@endsection