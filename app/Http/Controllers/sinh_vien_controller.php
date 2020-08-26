<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sinh_vien_model;
use Session;
use App\Http\Requests\sinhVienRequest;
class sinh_vien_controller extends Controller
{
	public function view_sinh_vien(){
		$sinh_vien = sinh_vien_model::get_all();
		return view ('admin.sinh_vien',compact('sinh_vien'));
	}
	public function them_sinh_vien(){
		$lop=sinh_vien_model::get_lop();
		return view('admin.them_sinh_vien',compact('lop'));
	}
	public function them_sinh_vien_xu_ly(sinhVienRequest $rq){
		$sinh_vien = new sinh_vien_model();
		$sinh_vien->ten = $rq->ten;
		$sinh_vien->email = $rq->email;
		$sinh_vien->anh_dai_dien = $rq->anh_dai_dien->getClientOriginalName();
        $rq->anh_dai_dien->move('img/avatar',$rq->anh_dai_dien->getClientOriginalName());
		$sinh_vien->username = $rq->username;
		$sinh_vien->password = $rq->password;
		$sinh_vien->ngay_sinh = $rq->ngay_sinh;
		$sinh_vien->so_dien_thoai = $rq->so_dien_thoai;
		$sinh_vien->gioi_tinh = $rq->gioi_tinh;
		$sinh_vien->ma_lop = $rq->ma_lop;
		$sinh_vien->trang_thai = $rq->trang_thai;
		$sinh_vien->process_insert();
		return redirect()->route('quan_ly_sinh_vien.view_sinh_vien');
	}
	public function sua_sinh_vien(Request $rq){
		$ma_sinh_vien = $rq->ma_sinh_vien;
		$sinh_vien = sinh_vien_model::get_one($ma_sinh_vien);
		$lop=sinh_vien_model::get_lop();
		return view('admin.sua_sinh_vien',compact('sinh_vien','lop'));
	}
	public function sua_sinh_vien_xu_ly(sinhVienRequest $rq){
   	$sinh_vien = new sinh_vien_model();
   	$sinh_vien->ma_sinh_vien = $rq->ma_sinh_vien;
$sinh_vien->ten = $rq->ten;
		$sinh_vien->email = $rq->email;
		$sinh_vien->username = $rq->username;
		$sinh_vien->password = $rq->password;
		$sinh_vien->ngay_sinh = $rq->ngay_sinh;
		$sinh_vien->so_dien_thoai = $rq->so_dien_thoai;
		$sinh_vien->gioi_tinh = $rq->gioi_tinh;
		$sinh_vien->ma_lop = $rq->ma_lop;
   	$sinh_vien->process_update();
   	return redirect()->route('quan_ly_sinh_vien.view_sinh_vien');
   }
   public function xoa_sinh_vien(Request $rq){
   	$sinh_vien = new sinh_vien_model();
   	$sinh_vien->ma_sinh_vien = $rq->ma_sinh_vien;
   	$sinh_vien->process_delete();
   	return redirect()->route('quan_ly_sinh_vien.view_sinh_vien');
   }
   public function khoa_sinh_vien(Request $rq){
   	$sinh_vien = new sinh_vien_model();
   	$sinh_vien->ma_sinh_vien = $rq->ma_sinh_vien;
   	$sinh_vien->process_block();
   	return redirect()->route('quan_ly_sinh_vien.view_sinh_vien');
   }
}