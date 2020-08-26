<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- start linking  -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <!-- icon -->
  <link rel="icon" href="{{asset('img/log.png')}}">
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <!-- end linking -->
  <title>@yield('name')</title>
</head>
<body>
<!-- start admin -->
<section id="admin">
  <!-- start sidebar -->
  <div class="sidebar">
    <!-- start with head -->
    <div class="head">
      <div class="logo">
        <img src="{{asset('img/logo-admin.png')}}" alt="">
      </div>
    </div>
    <!-- end with head -->
    <!-- start the list -->
    <div id="list">
      <ul class="nav flex-column">
       <!-- menu1 -->
        <li class="nav-item"><a href="#menu1" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-user"></i>Sinh viên<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
        <!-- start charts submenue -->
        <li class="sub collapse" id="menu1">
            <a href="{{ route('quan_ly_sinh_vien.view_sinh_vien') }}" class="nav-link" data-parent="#menu1">Danh sách sinh viên</a>
            <a href="{{ route('quan_ly_sinh_vien.them_sinh_vien')}}" class="nav-link" data-parent="#menu1">Thêm sinh viên</a>
        </li>
        <!-- menu2 -->
        <li class="nav-item"><a href="#menu2" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-book"></i>Môn học<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
        <!-- start charts submenue -->
        <li class="sub collapse" id="menu2">
            <a href="{{ route('quan_ly_mon_hoc.view_mon') }}" class="nav-link" data-parent="#menu2">Danh sách môn</a>
            <a href="{{ route('quan_ly_mon_hoc.them_mon')}}" class="nav-link" data-parent="#menu2">Thêm môn</a>
        </li>
        <!-- menu3 -->
        <li class="nav-item"><a href="#menu3" class="nav-link collapsed" data-toggle="collapse"><i class="fa fa-star"></i>Điểm<span class="sub-ico"><i class="fa fa-angle-down"></i></span></a></li>
        <!-- start charts submenue -->
        <li class="sub collapse" id="menu3">
            <a href="{{ route('quan_ly_diem.view_diem') }}" class="nav-link" data-parent="#menu3">Điểm</a>
            <a href="{{ route('quan_ly_diem.them_diem') }}" class="nav-link" data-parent="#menu3">Cập nhật điểm</a>
        </li>
        <!-- end charts submenue -->
        <!-- end with charts -->
        <li class="nav-item"><a href="{{ route('quan_ly_khoa.view_khoa') }}" class="nav-link"><i class="fa fa-inbox"></i>Khóa</a></li>
        <li class="nav-item"><a href="{{ route('quan_ly_nganh.view_nganh') }}" class="nav-link"><i class="fas fa-th-large"></i>Ngành</a></li>
        <li class="nav-item"><a href="{{ route('quan_ly_lop.view_lop') }}" class="nav-link"><i class="fa fa-edit"></i>Lớp</a></li>
      </ul>
    </div>
    <!-- end the list -->
  </div>
  <!-- end sidebar -->
  <!-- start content -->
  <div class="content">
    <!-- start content head -->
    <div class="head">
      <!-- head top -->
      <div class="top">
        <div class="left">
          <button id="on" class="btn btn-info"><i class="fa fa-bars"></i></button>
          <button id="off" class="btn btn-info hide"><i class="fa fa-align-left"></i></button>
          <button class="btn btn-info hidden-xs-down"><i class="fas fa-arrow-left"></i><!-- <a href="{{ URL::previous() }}">Trang trước</a> --><a href="javascript:history.back()">Trở lại</a></button>
        </div>
        <div class="right">
          <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Xin chèo <?php echo Session::get('ten'); ?></button>
            <div class="dropdown-menu" aria-labelledby="userDropdown">
             <a class="dropdown-item" href="#">Thông tin</a>
             <a class="dropdown-item" href="{{ route('admin.logout') }}">Đăng xuất</a>
           </div>
          </div>
        </div>
      </div>
      <!-- end head top -->
      <!-- start head bottom -->

      <!-- end head bottom -->
    </div>
    <!-- end content head -->
    <!-- start with the real content -->
    <div id="real">
      @yield('content')
    </div>
    
    <!-- end the real content -->
  </div>
  <!-- end content -->
</section>
<!-- end admin -->
<!-- start screpting -->

<script src="{{asset('js/tether.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/highcharts.js')}}"></script>
<script src="{{asset('js/chart.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<!-- end screpting -->
</body>
</html>
