@extends('admin.layouts.master1')

@section('content')
<div class="container-fluid">
  <!-- Breadcrumbs-->
  @include('admin.blocks.breadcrumb')
  <div class="card mt-5" >
    @if(session('mess'))
    <div class="alert alert-success">{{session('mess')}}</div>
    @endif
    <div class="card-header">Thêm thể loại mới</div>
    <div class="card-body">
      <form method="POST" action="{{route('tintuc.store')}}" enctype="multipart/form-data"> 
        @csrf
        <div class="row">
          <div class="col-md-9">

            <div class="form-group">
              <div class="form-row">

                <label for="tieude">Tiêu Đề</label>
                <input class="form-control @error('tieude')is-invalid @enderror" id="tieude" type="text" name="tieude" placeholder="Nhap tieu de" >
                @error('tieude')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>

            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <label for="exampleInputName">Tóm tắt</label>
                  <textarea id="demo9" class="form-control ckeditor" rows="3" name="tomtat" data-sample-short>

                  </textarea>
                  @error('tomtat')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <label for="exampleInputName">Nội dung</label>
                  <textarea id="demo10" class="form-control ckeditor" rows="10" name="noidung"></textarea>
                  @error('noidung')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">


            <div class="form-group">
              <div class="form-row">

                <label for="theloai-input">Thể loại</label>

                <select id="theloai-input" class="form-control rounded-0 custom-select" style="height:30px;padding-top: 2px; " name="theloai">
                  <option value="null" selected>Chọn thể loại</option>
                  @foreach($theloai as $item)
                  <option value="{{$item->id}}">{{$item->Ten}}</option>
                  @endforeach
                </select>

                @error('theloai')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror

              </div>
            </div>

            <div class="form-group">
              <div class="form-row">

                <label for="loaitin-input">Loại tin</label>
                <select id="loaitin-input" class="form-control rounded-0 custom-select" style="height:30px;padding-top: 2px; " name="loaitin">
                  <option value="0" selected>Chọn loại tin</option>
                </select>
                @error('loaitin')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>

            </div>

            <div class="form-group">
             <label >Thêm hình ảnh</label>
             <div class="form-row custom-file" >

              <label class="custom-file-label" for="tintuc_image">Thêm hình ảnh</label>
              <input type="file" class="custom-file-input" id="tintuc_image" name="image">
              @error('image')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6 custom-control custom-checkbox ml-4">

                <input class="custom-control-input" type="checkbox" value="1" id="defaultCheck1" name="noibat">
                <label class="form-check-label custom-control-label" for="defaultCheck1">Nổi bật</label>
              </div>
            </div>
          </div>


          <div class="col-md-6 offset-md-3">
            <input type="submit" class="btn btn-primary btn-block" value="Thêm">
          </div>

        </div>
      </div>
    </form>
  </div>
</div>
@endsection









