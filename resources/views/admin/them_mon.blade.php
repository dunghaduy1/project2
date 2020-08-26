@extends('admin.index')
@section('name')
	Thêm môn
@endsection
@section('content')
<form action="{{ route('quan_ly_mon_hoc.them_mon_xu_ly') }}" method="POST">
	{{ csrf_field() }}
<table class="table" cellspacing="0" cellpadding="0" width="50%">
	<tr>
		<td>Tên môn
		<input type="text" name="ten_mon" class="form-control"></td>
	</tr>
	<tr>
		<td>Phương thức thi <br>
			<input type="radio" id="lithuyet" name="phuong_thuc_thi" value="1">
  			<label for="lithuyet">Lý Thuyết</label>
  			<input type="radio" id="thuchanh" name="phuong_thuc_thi" value="2">
  			<label for="thuchanh">Thực hành</label>
	</tr>
		<input type="hidden" name="trang_thai" class="form-control" value="1"></td>
	<tr>
		<td>Tên ngành học
			<select name="ma_nganh" id=""class="form-control">
				<option value="">Chọn ngành học</option>
			@foreach ($nganh as $eac)
				<option value="{{ $eac->ma_nganh }}">{{ $eac->ten_nganh }}</option>
			@endforeach
			</select>
		</td>
	</tr>
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