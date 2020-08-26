@extends('admin.index')
@section('name')
	Sửa thông tin môn
@endsection
@section('content')
<form action="{{ route('quan_ly_mon_hoc.sua_mon_xu_ly',['ma_mon'=>$mon[0]->ma_mon])}}" method="POST">
	{{ csrf_field() }}
<table class="table" cellspacing="0" cellpadding="0" width="40%">
	@foreach ($mon as $each)
	<tr>
		<td>Tên môn
		<input type="text" name="ten_mon" value="{{ $each->ten_mon}}"class="form-control"></td>
	</tr>

	  		<input type="hidden" name="trang_thai" value="{{ $each->trang_thai}}"></td>

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
<button class="btn btn-primary" name="submit">Thêm</button>
</form>
@endsection