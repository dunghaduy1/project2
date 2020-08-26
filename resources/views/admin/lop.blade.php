@extends('admin.index')
@section('name')
	Danh sách lớp
@endsection
@section('content')
<button class="btn btn-primary">
	<a style="color: white" href="{{ route('quan_ly_lop.them_lop')}}">Thêm</a>
</button>
<table class="table" cellspacing="0" cellpadding="0" width="80%">
	
	{{ csrf_field() }}
	<thead>
	  <tr>
	  	<th>Mã lớp</th>
	  	<th>Tên lớp</th>
	  	<th>Mã khóa</th>
	  	<th>Mã ngành</th>
	  	<th>Sửa</th>
	  	<th>Xóa</th>
	  </tr>
	</thead>
	  @foreach ($lop as $each)
	<tbody>
	  	<tr>
	  		<td>{{ $each->ma_lop }}</td>
	  		<td>{{ $each->ten_lop }}</td>
	  		<td>{{ $each->ten_khoa }}</td>
	  		<td>{{ $each->ten_nganh }}</td>
	  		<td><a href="{{ route('quan_ly_lop.sua_lop',['ma_lop'=>$each->ma_lop]) }}">Sửa</a></td>
	  		<td><a href="{{ route('quan_ly_lop.xoa_lop',['ma_lop'=>$each->ma_lop]) }}">Xóa</a></td>
	  	</tr>
	  @endforeach
	</tbody>
</table>
@endsection