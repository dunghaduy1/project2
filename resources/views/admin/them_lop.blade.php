@extends('admin.index')
@section('name')
	Thêm lớp
@endsection
@section('content')
<form action="{{ route('quan_ly_lop.them_lop_xu_ly') }}" method="POST">
	{{ csrf_field() }}
<table class="table" cellspacing="0" cellpadding="0" width="40%">
	<tr>
		<td>Tên lớp
		<input type="text" name="ten_lop" class="form-control"></td>
	</tr>
	<tr>
		<td>Tên khóa học
			<select name="ma_khoa" id=""class="form-control">
				<option value="">Chọn khóa</option>
			@foreach ($khoa as $each)
				<option value="{{ $each->ma_khoa }}">{{ $each->ten_khoa }}</option>
			@endforeach
			</select>
	</tr>
	<tr>
		<td>Tên ngành học
			<select name="ma_nganh" id=""class="form-control">
				<option value="">Chọn ngành</option>
			@foreach ($nganh as $each)
				<option value="{{ $each->ma_nganh }}">{{ $each->ten_nganh }}</option>
			@endforeach
			</select>
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