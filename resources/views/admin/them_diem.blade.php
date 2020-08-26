@extends('admin.index')
@section('name')
	Thêm điểm
@endsection
@section('content')
<table class="table" >
	<tr>
		<th>Tên khóa</th>
		<th>Tên ngành</th>
		<th>Tên lớp</th>
		<th>Tên môn</th>
	</tr>
	<tr>
		<td>
			<select name="ma_khoa" id="ten_khoa"class="form-control">
					<option value="0">Chọn</option>
				@foreach ($khoa as $each)
					<option value="{{ $each->ma_khoa }}">{{ $each->ten_khoa }}</option>
				@endforeach
				</select>
		</td>
		<td>
			<select name="ma_nganh" id="ten_nganh"class="form-control">
					<option value="0">Chọn</option>
				@foreach ($nganh as $each)
					<option value="{{ $each->ma_nganh }}">{{ $each->ten_nganh }}</option>
				@endforeach
				</select>
		</td>
		<td>
			<select name="ma_lop" id="ten_lop"class="form-control">
				<option value="0">Chọn</option>
			</select>
		</td>
		<td>
			<select name="ma_mon" id="ten_mon"class="form-control">
				<option value="0"></option>
			</select>
		</td>
	</tr>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		$('#ten_khoa,#ten_nganh').change(function(){
			// var ma_khoa = $('#ten_khoa').val();
			// var ma_nganh = $('#ten_nganh').val();
			$.ajax({
				url: '{{route("quan_ly_diem.load_lop")}}',
				type: 'GET',
				data:{
					ma_khoa: $('#ten_khoa').val(),
					ma_nganh: $('#ten_nganh').val(),
				},
				success: function(data){
					$("#ten_lop").html(data);
				}
			});
		});
	});
</script>
<script>
	$(document).ready(function(){
		$('#ten_nganh').change(function(){
			$.ajax({
				url: '{{route("quan_ly_diem.load_mon")}}',
				type: 'GET',
				data:{
					ma_nganh: $('#ten_nganh').val(),

				},
				success: function(data){
					$("#ten_mon").html(data);
				}
			});
		});
	});
</script>
<form action="{{ route('quan_ly_diem.them_diem_xu_ly') }}" method="post">
	<input type="hidden" name="ma_mon" id="monid" value="" class="form-control">
<script>
	$(document).ready(function(){
		$('#ten_mon').change(function(){
			$("#monid").val($('#ten_mon').val());
		});
	});	
</script>	

	<table class="table table-hover"  >
	<thead>
	  <tr>
	  	<th>Mã SV</th>
	  	<th>Tên</th>
	  	<th>Ngày sinh</th>
	  	<th>Điểm lần 1</th>
	  	<th>Điểm lần 2</th>
	  	<th>Trạng thái</th>
	  </tr>
	</thead>
	<tbody id="viewdiem">
	
	</tbody>
</table>
<script>
	$(document).ready(function(){
		$('#ten_nganh,#ten_mon,#ten_lop,#ten_khoa').change(function(){
			$.ajax({
				url: '{{route("quan_ly_diem.load_them_diem")}}',
				type: 'GET',
				data:{
					ma_nganh: $('#ten_nganh').val(),
					ma_khoa: $('#ten_khoa').val(),
					ma_lop: $('#ten_lop').val(),
					ma_mon: $('#ten_mon').val(),

				},
				success: function(data){
					$("#viewdiem").html(data);
				}
			});
		});
	});
</script>
<button class="btn btn-primary">Thêm</button>
</form>
@endsection