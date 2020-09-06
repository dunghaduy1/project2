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
	 <link rel="icon" href="https://www.bkacad.com/images/favicon.ico">
	 <style>
	 	html,
body {
   margin:0;
   padding:0;
   height:100%;
}
	 </style>
</head>
<body>
	
	<div class="container" style="position: relative;
min-height: 100%;">
		<div class="header" style="padding:20px; border-bottom: 5px solid black">
			<img src="{{asset('img/logo_1591255072.png')}}" alt="">
		</div>
		<div class="content" style="padding-bottom: 70px;">
			<div class="row">
				<div class="col-3">
					<table class="table Table-Bordered" id="tt_sinh_vien" border="1">
				      @foreach ($sinh_vien as $each)

						  <tr>
						  	<th style="background-color: #006182;color:white">Mã sinh viên</th>
						  	<td>{{ $each->ma_sinh_vien }}</td>
						  </tr>
						  <tr>
						  	<th style="background-color: #006182;color:white">Tên sinh viên</th>
						  	<td>{{ $each->ten }}</td>
						  </tr>
						  <tr>
						  	<th style="background-color: #006182;color:white">Ngày sinh</th>
						  	<td>{{ $each->ngay_sinh }}</td>
						  </tr>
						 @endforeach
					</table>
		    	</div>
				<div class="col-9">
		      		<table class="table table-hover Table-Striped" border="1" id="tt_sinh_vien" >
		      			<thead style="background-color: #006182;color:white">
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
		
		<div class="footer_bot" style="color: #ffffff;background: #006182;position: absolute; bottom: 0;width: 100%;padding:20px; ">
            <div class="container-extra" style="">
                <div class="row c-footer_end">
                    <div class="c-social col-md-3">
                        <span class="c-title" style="font-size: 16px;margin-right: 10px;">
                            Liên kết mạng xã hội                        
                        </span>
                        <a class="c-item" target="_blank" href="https://www.facebook.com/Bkacad/"><img
                                    src="{{asset('img/img5.png')}}"></a>
                        <a class="c-item" target="_blank" href="https://www.youtube.com/user/bkacad"><img
                                    src="{{asset('img/img12.png')}}"></a>
                        <a class="c-item" target="_blank" href="https://instagram.com/bkacad_students?igshid=1ve1j2r3gah26"><img
                                    src="{{asset('img/img13.png')}}"></a>
                        <!--                                    <a class="a3" target="_blank" href="-->
                        <!--"><img-->
                        <!--                                                src="templates/default/images/img_footer/img15.png"></a>-->
                    </div>
                    <div class="c-copyright col-md-6" style="font-size: 16px;text-align: center;padding-top: 5px;">
                        Copyright © 2020 BKACAD. All Right Reserved                    </div>
                </div>
            </div>
        </div>
		
	</div>
	
	
</body>
</html>