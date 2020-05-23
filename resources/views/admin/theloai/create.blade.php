@extends('admin.layouts.master1')

@section('content')
<div class="container-fluid">
      <!-- Breadcrumbs-->
    @include('admin.blocks.breadcrumb')
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Thêm thể loại mới</div>
      <div class="card-body">
        <form method="POST" action="{{route('theloai.store')}}"> 
          @csrf
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Tên</label>
                <input class="form-control @error('theloai')is-invalid @enderror" id="exampleInputName" type="text" name="theloai" placeholder="Enter first name">
                @error('theloai')
                  <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="col-md-2">
          <input type="submit" class="btn btn-primary btn-block" value="Thêm">
          </div>
          @if(session('mess'))
          <div class="alert alert-success">{{session('mess')}}</div>
          @endif
        </form>
      </div>
    </div>
@endsection
