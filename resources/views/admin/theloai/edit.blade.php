@extends('admin.layouts.master1')

@section('content')
<div class="container-fluid">
      <!-- Breadcrumbs-->
    @include('admin.blocks.breadcrumb')
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Chỉnh sửa thông tin</div>
      <div class="card-body">
        <form method="POST" action="{{route('theloai.update',['theloai'=>$theloai->id])}}"> 
          @csrf
          @method('put')
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="theloai-ten">Tên:</label>
                <input class="form-control @error('theloai')is-invalid @enderror" id="theloai-ten" type="text" name="theloai" value="{{$theloai->Ten}}">
                @error('theloai')
                  <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <br><label for="exampleInputName">Danh sách loại tin:</label><br>
            @foreach($theloai->loaitin as $item)
            <div class="form-check form-check-inline">
              <input type="checkbox" id="{{$item->TenKhongDau}}" value="{{$item->id}}" checked name="loaitin[]">
              <label  for="{{$item->TenKhongDau}}" >{{$item->Ten}}</label>
            </div>
            @endforeach
      
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
            <label for="newloaitin">Thêm loại tin mới:</label>
              <input class="form-check-inline form-control @error('loaitin_moi')is-invalid @enderror " id="newloaitin" type="text" name="loaitin_moi">
              @error('loaitin_moi')
                  <div class="alert alert-danger">{{$message}}</div>
                @enderror
</div>

</div>

          </div>


          <div class="col-md-3">
          <input type="submit" class="btn btn-primary btn-block" value="Cập nhật">
          </div>
          @if(session('mess'))
          <div class="alert alert-success">{{session('mess')}}</div>
          @endif
        </form>
      </div>
    </div>
@endsection
