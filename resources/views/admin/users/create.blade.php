@extends('admin.layouts.master1')

@section('content')
<div class="container-fluid">
  <!-- Breadcrumbs-->
  @include('admin.blocks.breadcrumb')
  <div class="card card-register mx-auto mt-5">
    <div class="card-header">Thêm thành viên</div>
    <div class="card-body">
      <form method="POST" action="{{route('user.store')}}"> 
        @csrf
        <div class="form-group">
          <div class="form-row">

            <label for="name">Họ Tên</label>
            <input class="form-control @error('name')is-invalid @enderror" id="name" type="text" name="name" placeholder="Nhap ho ten" value="{{ old('name') }}">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">

            <label for="email">Email</label>
            <input class="form-control @error('email')is-invalid @enderror" id="email" type="text" name="email" placeholder="Nhap email" value="{{ old('email') }}">
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">

            <label for="password">Password</label>
            <input class="form-control @error('password')is-invalid @enderror" id="password" type="password" name="password">
            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
          </div>
          
        </div>

        <div class="form-group">
          <div class="form-row">

            <label for="password_confirm">Nhập lại password</label>
            <input class="form-control @error('password_confirm')is-invalid @enderror" id="password_confirm" type="password" name="password_confirm" >
            @error('password_confirm')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            
          </div>
        </div>

        <div class="form-group">
          <div class="form-row ">
            <p><label for="exampleInputName">Vai trò:  </label>
              <div class="custom-control custom-radio ml-2">
                <input class="form-control @error('role')is-invalid @enderror custom-control-input" id="khachhang" type="radio" name="role" value="0" checked>
                <label class="custom-control-label" for="khachhang">Khách hàng</label>
              </div>
              
              
              <div class="custom-control custom-radio ml-2">
               <input class="form-control @error('role')is-invalid @enderror custom-control-input" id="admin" type="radio" name="role" value="1" >
               <label  class="custom-control-label" for="admin">Admin</label>
             </div>
             @error('role')
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
           </div>
         </div>
         <div class="col-md-3 offset-md-4">
          <input type="submit" class="btn btn-primary btn-block" value="Thêm">
        </div>
        @if(session('mess'))
        <div class="alert alert-success">{{session('mess')}}</div>
        @endif
      </form>
    </div>
  </div>
  @endsection
