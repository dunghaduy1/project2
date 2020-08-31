@extends('admin.index')
@section('name')
	Sửa thông sinh viên
@endsection
@section('content')
<form action="{{ route('quan_ly_sinh_vien.sua_sinh_vien_xu_ly',['ma_sinh_vien'=>$sinh_vien[0]->ma_sinh_vien])}}" method="POST">
	{{ csrf_field() }}
<table class="table" cellspacing="0" cellpadding="0" width="40%">
	@foreach ($sinh_vien as $each)
	<tr>
		<td>
		Tên sinh viên:
		<input type="text" name="ten" value="{{ $each->ten }}" class="form-control"></td>
	</tr>
	<tr>
		<td>Email:
		<input type="email" name="email" value="{{ $each->email }}" class="form-control"></td>
	</tr>
	<tr>
		<td>Ngày sinh:
		<input type="date" name="ngay_sinh" value="{{ $each->ngay_sinh }}" class="form-control"></td>
	</tr>
	<tr>
		<td>Số điện thoại:
		<input type="text" name="so_dien_thoai" value="{{ $each->so_dien_thoai }}" class="form-control"></td>
	</tr>
	<tr>
		<td>Giới tính <br>

			<input type="radio" id="Nam" name="gioi_tinh" value="1" 
			@unless(($each->gioi_tinh)!=1)
			checked
			@endunless
			>
  			<label for="Nam">Nam</label><br>
  			<input type="radio" id="Nu" name="gioi_tinh" value="2"
  			@unless(($each->gioi_tinh)!=2)
			checked
			@endunless
			>
  			<label for="Nu">Nữ</label>
		</td>
	</tr>
	<tr>
		<td>Mã lớp
			<select name="ma_lop" id=""class="form-control">
			@foreach ($lop as $eac)
				<option value="{{ $eac->ma_lop }}">{{ $eac->ten_lop }}</option>
			@endforeach
			</select>
		</td>	
	</tr>
	 	@endforeach
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

<button class="btn btn-primary" name="submit">Sửa</button>
</form>
@endsection