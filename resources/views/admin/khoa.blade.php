@extends('admin.index')
@section('name')
	Danh sách khóa
@endsection
@section('content')
<button class="btn btn-primary">
		<a style="color: white" href="{{ route('quan_ly_khoa.them_khoa')}}">Thêm khóa</a>
</button>
<table class="table" cellspacing="0" cellpadding="0" width="50%">

	{{ csrf_field() }}
	 <thead>
	  <tr>
	  	<th>Mã khóa</th>
	  	<th>Tên Khóa</th>
	  	<th>Sửa</th>
	  	<th>Xóa</th>
	  </tr>
	</thead>
	  @foreach ($khoa as $each)
	  	<tbody>
	  	<tr>
	  		<td>{{ $each->ma_khoa }}</td>
	  		<td>{{ $each->ten_khoa }}</td>
	  		<td><a href="{{ route('quan_ly_khoa.sua_khoa',['ma_khoa'=>$each->ma_khoa]) }}">Sửa</a></td>
	  		<td><a href="{{ route('quan_ly_khoa.xoa_khoa',['ma_khoa'=>$each->ma_khoa]) }}">Xóa</a></td>
	  	</tr>
	  @endforeach
	</tbody>
</table>
@endsection