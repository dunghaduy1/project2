@extends('admin.index')
@section('name')
	Thêm sinh viên 
@endsection
@section('content')
  @if (Session::has('success'))
    <span class="alert alert-success alert-dismissible">{{ Session::get('success') }}</span>
  @endif
  @if (Session::has('error'))
    <span class="alert alert-success alert-dismissible">
    	{{ Session::get('error') }}
    </span>
  @endif
<form action="{{ route('quan_ly_sinh_vien.importExcel') }}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
<table class="table" cellspacing="0" cellpadding="0" width="50%">
	<tr>
		<td>File 
		<input type="file" name="excel" class="form-control"></td>
	</tr>
</table>
<button class="btn btn-primary" name="submit">Thêm</button>
</form>
@endsection