@extends('admin.index')
@section('name')
	Danh sách sinh viên
@endsection
@section('content')
	<button class="btn btn-primary" >
		<a style="color: white" href="{{ route('quan_ly_sinh_vien.them_sinh_vien')}}">Thêm sinh viên</a>
	</button>
<table class="table table-hover" cellspacing="0" cellpadding="0" width="80%">
	
	{{ csrf_field() }}	  
	 <thead>
	  <tr>
	  	<th>Mã sinh viên</th>
	  	<th>Tên sinh viên</th>
	  	<th>Email</th>
	  	<th>Số điện thoại</th>
	  	<th>Giới tính</th>
	  	<th>Ngày sinh</th>
	  	<th>Sửa</th>
	  	<th>Xóa</th>
	  </tr>
	</thead>
	  @foreach ($sinh_vien as $each)
	  	<tbody>
	  		<tr>
	  		<td>{{ $each->ma_sinh_vien }}</td>
	  		<td>{{ $each->ten }}</td>
	  		<td>{{ $each->email}}</td>
	  		<td>{{ $each->so_dien_thoai }}</td>
	  		<td>
				@if(($each->gioi_tinh)==1)
					Nam
				@else
					Nữ
				@endif
	  		</td>
	  		<td>{{ $each->ngay_sinh }}</td>
	  		<td>
	  			<button class="btn btn-info">
	  				<a href="{{ route('quan_ly_sinh_vien.sua_sinh_vien',['ma_sinh_vien'=>$each->ma_sinh_vien]) }}">Sửa</a>
	  			</button>  			
	  		</td>
	  		<td>
				<button class="btn btn-info">
					<a href="{{ route('quan_ly_sinh_vien.xoa_sinh_vien',['ma_sinh_vien'=>$each->ma_sinh_vien]) }}">Xóa</a>
				</button>
	  		</td>
	  	</tr>
	  @endforeach
	  </tbody>
	  @if ($errors->any()) 
	    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</table>
@endsection