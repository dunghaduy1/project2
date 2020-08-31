@extends('admin.index')
@section('name')
	Danh sách sinh viên
@endsection
@section('content')
	<button class="btn btn-primary" >
		<a style="color: white" href="{{ route('quan_ly_sinh_vien.them_sinh_vien')}}">Thêm sinh viên</a>
	</button>

<table class="table" >
	<tr>
		<th>Tên khóa</th>
		<th>Tên ngành</th>
		<th>Tên lớp</th>
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
	</tr>
</table>

<table class="table table-hover" cellspacing="0" cellpadding="0" width="80%">
	
	{{ csrf_field() }}	  
	 <thead>
	  <tr>
	  	<th>Mã sinh viên</th>
	  	<th>Tên sinh viên</th>
	  	<th>Email</th>
	  	<th>Số điện thoại</th>
	  	<th>Giới tính</th>
	  	<th>Ngày sinh</th>
	  	<th>Sửa</th>
	  </tr>
	</thead>

	  	<tbody id="view_sinh_vien">

	  </tbody>
</table>

@endsection
@push('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('#ten_khoa,#ten_nganh').change(function(){
			$.ajax({
				url: '{{route("quan_ly_sinh_vien.load_lop")}}',
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
		$('#ten_nganh,#ten_lop,#ten_khoa').change(function(){
			$.ajax({
				url: '{{route("quan_ly_sinh_vien.get_sinh_vien_by_lop")}}',
				type: 'GET',
				dataType: 'json',
				data:{
					ma_lop: $('#ten_lop').val(),
				},
				success: function(data){
					$("#view_sinh_vien").empty();
					$(data).each(function(){
						$("#view_sinh_vien").append(`
							<tr>
								<td>
									${this.ma_sinh_vien}
								</td>
							  	<td>
									${this.ten}
								</td>
							  	<td>
									${this.email}
								</td>
							  	<td>
									${this.so_dien_thoai}
								</td>
							  	<td>
									${(this.gioi_tinh==1) ? 'Nam' : 'Nữ'}
								</td>
							  	<td>
									${this.ngay_sinh}
								</td>
							  	<td>
							  		<a href='{{ route('quan_ly_sinh_vien.sua_sinh_vien') }}?ma_sinh_vien=${this.ma_sinh_vien}'>
							  			Sửa
							  		</a>
							  	</td>
							</tr>
						`);
					});
				}
			});
		});
	});
</script>
@endpush