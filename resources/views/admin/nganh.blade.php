@extends('admin.index')
@section('name')
	Danh sách ngành học
@endsection
@section('content')
	<button class="btn btn-primary" >
		<a style="color: white" href="{{ route('quan_ly_nganh.them_nganh')}}">Thêm ngành học</a>
	</button>
<table class="table table-hover" cellspacing="0" cellpadding="0" width="50%">
	{{ csrf_field() }}
	<thead>
	  <tr>
	  	<th>Mã ngành</th>
	  	<th>Tên ngành</th>
	  	<th>Sửa</th>
	  	<th>Xóa</th>
	  </tr>
	</thead>
	  <tbody>	  
	  	@foreach ($nganh as $each)
	  	<tr>
	  		<td>{{ $each->ma_nganh }}</td>
	  		<td>{{ $each->ten_nganh }}</td>
	  		<td><a href="{{ route('quan_ly_nganh.sua_nganh',['ma_nganh'=>$each->ma_nganh]) }}">Sửa</a></td>
	  		<td><a href="{{ route('quan_ly_nganh.xoa_nganh',['ma_nganh'=>$each->ma_nganh]) }}">Xóa</a></td>
	  	</tr>
	  </tbody>

	  @endforeach
</table>
@endsection