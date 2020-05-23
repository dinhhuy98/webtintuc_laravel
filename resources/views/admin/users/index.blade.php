@extends('admin.layouts.master1')

@section('content')
<div class="container-fluid">
	<!-- Breadcrumbs-->
	@include('admin.blocks.breadcrumb')
	<!-- Example DataTables Card-->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fa fa-table"></i> Danh sách thành viên
			<a href="{{route('user.create')}}"><button type="button" class="btn btn-primary">Thêm thành viên</button></a>
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
							<th>Email</th>
							<th style="width:12%">Vai Trò</th>
							<th style="width:10%">Số bình luận</th>
							<th style="width:12%">Chi tiết</th>
							<th style="width:12%">Xóa</th>
						</tr>
					</thead>
					<tbody>
						@foreach($user as $item)
						<tr>
							<td>{{$item->id}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->email}}</td>
							<td>{{$item->role==1?"Admin":"Khách hàng"}}</td>
							<td>{{$item->comment->count()}}</td>
							<td><a href="{{route('user.edit',['user'=>$item->id])}}" class="text-decoration-none btn btn-warning"><i class="fa fa-edit"></i> Chi tiết</a></td>
							<td>
								<form action="{{route('user.destroy',['user'=>$item->id])}}" method="POST">
									@csrf
									@method('DELETE')

									<button type="submit" class="text-decoration-none btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Delete</button>
								</form></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					 <div class="float-right">
              {{$user->links()}}
            </div>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>

	@endsection