@extends('admin.layouts.master1')

@section('content')
<div class="container-fluid">
  <!-- Breadcrumbs-->
  @include('admin.blocks.breadcrumb')
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Thông tin chi tiết</div>
    <div class="card-body">
       <div>
        ID: {{$user->id}}
      </div>
      <div>
        Họ Tên: {{$user->name}}
      </div>
       <div>
        Email: {{$user->email}}
      </div>
       <div>
        Ngày tạo: {{$user->created_at}}
      </div>
      <form method="POST" action="{{route('user.update',['user'=>$user->id])}}"> 
        @csrf
        @method('put')
        <div class="form-group">
          <div class="form-row mt-3 ">
            <p><label for="exampleInputName">Vai trò:  </label>
              <div class="custom-control custom-radio ml-2">
                <input class="form-control @error('role')is-invalid @enderror custom-control-input" id="khachhang" type="radio" name="role" value="0" {{$user->role==0?"checked":""}}>
                <label class="custom-control-label" for="khachhang">Khách hàng</label>
              </div>
              
              
              <div class="custom-control custom-radio ml-2">
               <input class="form-control @error('role')is-invalid @enderror custom-control-input" id="admin" type="radio" name="role" value="1" {{$user->role==1?"checked":""}} >
               <label  class="custom-control-label" for="admin">Admin</label>
             </div>
             @error('role')
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
           </div>
         </div>
         <div class="col-md-3 offset-md-4">
          <input type="submit" class="btn btn-primary btn-block" value="Cập nhật">
        </div>
        @if(session('mess'))
        <div class="alert alert-success">{{session('mess')}}</div>
        @endif
      </form>

    </div>

  </div>


            <div class="row ">
       <div class="card mb-3 mx-auto">
        <div class="card-header">
          <i class="fa fa-table"></i>  Danh sách bình luận của thành viên
          <div class="float-right">

          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive text-center">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr >
                  <th style="width:3%">ID</th>
                  <th>ID Tin Tức</th>
                  <th>Nội dung</th>
                  <th>Ngày Đăng</th>
                  <th >Xóa</th>
                </tr>
              </thead>
              <tbody>
                @foreach($comment as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->tintuc->id}}</td>
                  <td>{{$item->NoiDung}}</td>
                  <td>{{$item->created_at}}</td>
                  <td><form action="{{route('comment.destroy',['comment'=>$item->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</button>
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
