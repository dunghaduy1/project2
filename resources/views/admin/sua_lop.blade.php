@extends('admin.index')
@section('name')
	Sửa thông tin lớp
@endsection
@section('content')
<form action="{{ route('quan_ly_lop.sua_lop_xu_ly',['ma_lop'=>$lop[0]->ma_lop])}}" method="POST">
	{{ csrf_field() }}
<table class="table" cellspacing="0" cellpadding="0" width="50%">
	@foreach ($lop as $each)
	<tr>
	  	<td>Tên lớp
	  	<input type="text" name="ten_lop" value="{{ $each->ten_lop}}" class="form-control"></td>
	</tr>
	<tr>	
		<td>Tên khóa học
			<select name="ma_khoa" id=""class="form-control">
			@foreach ($khoa as $eac)
				<option value="{{ $eac->ma_khoa }}">{{ $eac->ten_khoa }}</option>
			@endforeach
			</select>
	</tr>
	<tr>
		<td>Tên ngành học
			<select name="ma_nganh" id=""class="form-control">
			@foreach ($nganh as $eacz)
				<option value="{{ $eacz->ma_nganh }}">{{ $eacz->ten_nganh }}</option>
			@endforeach
			</select>
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