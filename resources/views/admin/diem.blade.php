@extends('admin.index')
@section('name')
	Danh sách điểm
@endsection
@section('content')
<table class="table" >
	<tr>
		<th>Tên khóa</th>
		<th>Tên ngành</th>
		<th>Tên lớp</th>
		<th>Tên môn</th>
		<th>Kiểu thi</th>
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
				<option value="0">Chọn</option>
			</select>
		</td>
		<td>
			<select name="kieu_thi" id="kieu_thi"class="form-control">
				<option value="">-Chọn-</option>
				<option value="1">Lý thuyết</option>
				<option value="2">Thực hành</option>
			</select>
		</td>
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
<table class="table table-hover"  >
	<thead>
	  <tr>
	  	<th>Mã SV</th>
	  	<th>Tên</th>
	  	<th>Ngày sinh</th>
	  	<th>Điểm lần 1</th>
	  	<th>Điểm lần 2</th>
	  </tr>
	</thead>
	
	<tbody id="viewdiem">

	</tbody>
</table>
@endsection
@push('js')
<script>
	$(document).ready(function(){
		$('#ten_khoa,#ten_nganh').change(function(){
			var ma_khoa = $('#ten_khoa').val();
			var ma_nganh = $('#ten_nganh').val();
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
		$('#ten_mon,#ten_lop,#kieu_thi').change(function(){
			$.ajax({
				url: '{{route("quan_ly_diem.load_diem")}}',
				dataType: 'json',
				type: 'GET',
				data:{
					ma_lop: $('#ten_lop').val(),
					ma_mon: $('#ten_mon').val(),
					kieu_thi: $('#kieu_thi').val(),
				},
				success: function(data){
					$('#viewdiem').empty();
					$(data).each(function(){
						$('#viewdiem').append(`
							<tr>
								<td>
									${this.ma_sinh_vien}
								</td>
							  	<td>
									${this.ten}
								</td>
							  	<td>
									${this.ngay_sinh}
								</td>
							  	<td>
							  	<input type="text" name="diem" data-ma_sinh_vien="${this.ma_sinh_vien}" data-lan="1" class="form-control input_diem" data-kieu_thi="${this.kieu_thi}"  value="${this.diem_lan_mot}">
									
								</td>
								<td>
									<input type="text" name="diem" data-ma_sinh_vien="${this.ma_sinh_vien}" data-lan="2" class="form-control input_diem" data-kieu_thi="${this.kieu_thi}"  value="${this.diem_lan_hai}">
								</td>
							</tr>
						`);
					});
				}
			});
		});
		$(document).on('blur','.input_diem',function(){
			$.ajax({
				url: '{{route("quan_ly_diem.update_diem")}}',
				type: 'GET',
				data:{
					ma_sinh_vien: $(this).data('ma_sinh_vien'),
					lan: $(this).data('lan'),
					ma_mon: $('#ten_mon').val(),
					diem: $(this).val(),
					kieu_thi: $('#kieu_thi').val(),
				},
				success: function(){
					alert("Sửa thành công");
				}
				
			});
		})
	});
</script>
@endpush
