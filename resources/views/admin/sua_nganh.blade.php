@extends('admin.index')
@section('name')
	Sửa thông tin ngành
@endsection
@section('content')
<form action="{{ route('quan_ly_nganh.sua_nganh_xu_ly',['ma_nganh'=>$nganh[0]->ma_nganh])}}" method="POST">
	{{ csrf_field() }}
<table class="table" cellspacing="0" cellpadding="0" width="50%">
	@foreach ($nganh as $each)
	  <tr>
	  	<td>Tên ngành:
	  		<input type="text" name="ten_nganh" value="{{ $each->ten_nganh}}" class="form-control"></td>
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