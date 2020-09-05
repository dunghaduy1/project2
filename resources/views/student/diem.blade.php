<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xem điểm</title>
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-3">
				<table class="table Table-Bordered" id="tt_sinh_vien" >
			      @foreach ($sinh_vien as $each)

					  <tr>
					  	<th>Mã sinh viên</th>
					  	<td>{{ $each->ma_sinh_vien }}</td>
					  </tr>
					  <tr>
					  	<th>Tên sinh viên</th>
					  	<td>{{ $each->ten }}</td>
					  </tr>
					  <tr>
					  	<th>Ngày sinh</th>
					  	<td>{{ $each->ngay_sinh }}</td>
					  </tr>
					 @endforeach
				</table>
	    	</div>
			<div class="col-9">
	      		<table class="table table-hover Table-Striped" border="1" id="tt_sinh_vien" >
	      			<thead style="background-color: #ae55ff;color:white">
		      			<tr>
		      				<th>Tên môn</th>
		      				<th>Kiểu thi</th>
		      				<th>Điểm lần 1</th>
		      				<th>Điểm lần 2</th>
		      			</tr>	
	      			</thead>
	      			<tbody>
	      				@foreach ($diem as $each)
	      				<tr>
	      					<td>{{ $each->mon_hoc }}</td>
	      					<td>{{ ($each->kieu_thi==1)? "Lý thuyết":"Thực hành" }}</td>
	      					<td>{{ $each->diem_lan_mot }}</td>
	      					<td>{{ $each->diem_lan_hai }}</td>
	      				</tr>
	      				@endforeach
	      			</tbody>

	      		</table>
	    	</div>	
		</div>
		
			
	</div>
	
</body>
</html>