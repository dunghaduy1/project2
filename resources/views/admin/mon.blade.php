@extends('admin.index')
@section('name')
	Danh sách môn học
@endsection
@section('content')
	<button class="btn btn-primary" >
		<a style="color: white" href="{{ route('quan_ly_mon_hoc.them_mon')}}">Thêm môn học</a>
	</button>
<table class="table table-hover" cellspacing="0" cellpadding="0" width="80%">
	{{ csrf_field() }}
	<thead>
		<tr>
			<th>Mã môn</th>
			<th>Tên môn</th>
			<th>Phương thức thi</th>
			<th>Trạng thái</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
	</thead>
	  @foreach ($mon as $each)
	  	<tbody> 
	  		<tr>
	  		<td>{{ $each->ma_mon }}</td>
	  		<td>{{ $each->ten_mon }}</td>
	  		<td>
	  			@if(($each->phuong_thuc_thi)==1)
	  			Lý thuyết
	  			@else
	  			Thực hành
	  			@endif
	  		</td>
	  		<td>{{ $each->trang_thai }}</td>
	  		<td><a href="{{ route('quan_ly_mon_hoc.sua_mon',['ma_mon'=>$each->ma_mon]) }}">Sửa</a></td>
	  		<td><a href="{{ route('quan_ly_mon_hoc.xoa_mon',['ma_mon'=>$each->ma_mon]) }}">Xóa</a></td>
	  	</tr>
	  	</tbody>	
	  @endforeach
</table>
@endsection