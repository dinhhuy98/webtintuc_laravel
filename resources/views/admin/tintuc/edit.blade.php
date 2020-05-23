@extends('admin.layouts.master1')

@section('content')
<div class="container-fluid">
  <!-- Breadcrumbs-->
  @include('admin.blocks.breadcrumb')
  <div class="card mt-5">
    @if(session('mess'))
    <div class="alert alert-success">{{session('mess')}}</div>
    @endif
    <div class="card-header">Chỉnh sửa</div>
    <div class="card-body">
      <form method="POST" action="{{route('tintuc.update',['tintuc'=>$tintuc->id])}}" enctype="multipart/form-data"> 
        @csrf
        @method('put')
        <div class="row">
          <div class="col-md-9">
            <div class="form-group ">
              <div class="form-row ">
                
                <label for="tieude">Tiêu Đề</label>
                <input class="form-control @error('tieude')is-invalid @enderror" id="tieude" type="text" name="tieude" placeholder="Nhap tieu de" value="{!!$tintuc->TieuDe!!}">
                @error('tieude')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <label for="exampleInputName">Tóm tắt</label>
                  <textarea id="demo9" class="form-control ckeditor" rows="3" name="tomtat">
                    {{$tintuc->TomTat}}
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
                  <textarea id="demo10" class="form-control ckeditor" rows="10" name="noidung">
                    {{$tintuc->NoiDung}}
                  </textarea>
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
                
                <select id="theloai-input" class="form-control rounded-0 custom-select" style="height:30px;padding-top: 2px;" name="theloai">
                  <option value="null" selected>Chọn thể loại</option>
                  @foreach($theloai as $item)
                  
                  <option value="{{$item->id}}" {{$item->id==$tintuc->loaitin->id_theloai?"selected":""}}>{{$item->Ten}}</option>
                  
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
                <select id="loaitin-input" class="form-control rounded-0 custom-select" style="height:30px;padding-top: 2px;" name="loaitin">
                  @foreach($loaitin as $item)
                  <option value="{{$item->id}}" {{$item->id==$tintuc->id_loaitin?"selected":""}} >{{$item->Ten}}</option>
                  
                  @endforeach
                </select>
                @error('loaitin')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>
              
            </div>

            <div class="form-group">
             <label for="exampleInputName">Hình ảnh</label>
             <p> <img src="public/upload/tintuc/{{$tintuc->Hinh}}" style="width: 100px;height: 100px;"></p>
             <div class="form-row custom-file">
              
               
              <label for="exampleInputName" class="custom-file-label">Hình ảnh</label>
              <input type="file" class="form-control-file custom-file-input" id="exampleFormControlFile1" name="image">
              @error('image')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
              
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6 custom-control custom-checkbox ml-4">
               
                <input class="custom-control-input" type="checkbox" value="1" id="defaultCheck1" name="noibat" {{$tintuc->NoiBat==1? "checked":""}} >
                <label class="form-check-label  custom-control-label" for="defaultCheck1">Nổi bật</label>
              </div>
            </div>
          </div>

          <div class="col-md-6 offset-md-3">
            <input type="submit" class="btn btn-primary btn-block" value="Cập nhật">
          </div>

        </div>
      </div>

      <div class="row ml-1">
       <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>  Danh sách bình luận của bài viết
          <div class="float-right">

          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive text-center">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr >
                  <th style="width:3%">ID</th>
                  <th>Người đăng</th>
                  <th>Nội dung</th>
                  <th>Ngày Đăng</th>
                  <th >Xóa</th>
                </tr>
              </thead>
              <tbody>
                @foreach($comment as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->user->name}}</td>
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
  </form>
</div>
</div>
@endsection




















