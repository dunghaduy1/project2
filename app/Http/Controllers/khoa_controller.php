<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khoa_model;
use Session;
use App\Http\Requests\khoaRequest;
class khoa_controller extends Controller
{
	public function view_khoa(){
		$khoa = khoa_model::get_all();
		return view ('admin.khoa',compact('khoa'));
	}
	public function them_khoa(){
		return view ('admin.them_khoa');
	}
	public function them_khoa_xu_ly(khoaRequest $rq){
		$khoa = new khoa_model();
		$khoa->ten_khoa = $rq->ten_khoa;
		$khoa->process_insert();
		return redirect()->route('quan_ly_khoa.view_khoa');
	}
	public function sua_khoa(Request $rq){
		$ma_khoa = $rq->ma_khoa;
		$khoa = khoa_model::get_one($ma_khoa);
		return view('admin.sua_khoa',compact('khoa'));
	}
	public function sua_khoa_xu_ly(khoaRequest $rq){
   	$khoa = new khoa_model();
   	$khoa->ma_khoa = $rq->ma_khoa;
   	$khoa->ten_khoa = $rq->ten_khoa;
   	$khoa->process_update();
   	return redirect()->route('quan_ly_khoa.view_khoa');
   }
   public function xoa_khoa(Request $rq){
   	$khoa = new khoa_model();
   	$khoa->ma_khoa = $rq->ma_khoa;
   	$khoa->process_delete();
   	return redirect()->route('quan_ly_khoa.view_khoa');
   }
}