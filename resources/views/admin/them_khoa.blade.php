@extends('admin.index')
@section('name')
	Thêm khóa
@endsection
@section('content')
<form action="{{ route('quan_ly_khoa.them_khoa_xu_ly') }}" method="POST">
	{{ csrf_field() }}
<table class="table" cellspacing="0" cellpadding="0" width="50%">
	  <tr>
	  	<td>Tên khóa
	  	<input type="text" name="ten_khoa" class="form-control"></td>
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