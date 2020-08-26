@extends('admin.index')
@section('name')
	Thêm ngành
@endsection
@section('content')

<form action="{{ route('quan_ly_nganh.them_nganh_xu_ly') }}" id="nganh" method="POST">
	{{ csrf_field() }}
<table class="table" cellspacing="0" cellpadding="0" width="100%">
	  <tr> 	
	  	<td>
	  	<label for="ten_nganh">Tên ngành</label>
	  	<input type="text" id="ten_nganh" name="ten_nganh" class="form-control">
	  	</td>
		@if ($errors->any()) 
	    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
		<!-- <td><p class="help is-danger">{{ $errors->first('ten_nganh') }}</p></td> -->
	</tr>
</table>
<button class="btn btn-primary" name="submit">Thêm</button>
</form>
@endsection