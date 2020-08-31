@extends('admin.index')
@section('name')
	Thêm sinh viên
@endsection
@section('content')
<form action="{{ route('quan_ly_sinh_vien.them_sinh_vien_xu_ly') }}" enctype="multipart/form-data" method="POST">
	{{ csrf_field() }}
<table class="table" cellspacing="0" cellpadding="0" width="50%">
	<tr>
		<td>Tên sinh viên
		<input type="text" name="ten" class="form-control"></td>
	</tr>
	<tr>
		<td>Email
		<input type="email" name="email" class="form-control"></td>
	</tr>
	<tr>
		<td>Ngày sinh
		<input type="date" name="ngay_sinh" class="form-control"></td>
	</tr>
	<tr>
		<td>Số điện thoại
		<input type="text" name="so_dien_thoai" class="form-control"></td>
	</tr>
	<tr>
		<td>Giới tính <br>
			<input type="radio" id="Nam" name="gioi_tinh" value="1">
  			<label for="Nam">Nam</label><br>
  			<input type="radio" id="Nu" name="gioi_tinh" value="2">
  			<label for="Nu">Nữ</label>
		</td>
	</tr>
	<tr>
		<td>Tên lớp
			<select name="ma_lop" id=""class="form-control">
				<option value="">Chọn lớp</option>
			@foreach ($lop as $each)
				<option value="{{ $each->ma_lop }}">{{ $each->ten_lop }}</option>
			@endforeach
			</select>
		</td>
	</tr>
	<input type="hidden" name="trang_thai" value="1">
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
<button class="btn btn-primary" name="submit">Thêm</button>
</form>
@endsection