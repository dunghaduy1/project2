@extends('admin.index')
@section('name')
	Sửa thông tin khóa
@endsection
@section('content')
<form action="{{ route('quan_ly_khoa.sua_khoa_xu_ly',['ma_khoa'=>$khoa[0]->ma_khoa])}}" method="POST">
	{{ csrf_field() }}
<table class="table" cellspacing="0" cellpadding="0" width="50%">
	@foreach ($khoa as $each)
	  <tr>
	  	<td>Tên khóa
	  	<input type="text" name="ten_khoa" value="{{ $each->ten_khoa}}" class="form-control"></td>
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