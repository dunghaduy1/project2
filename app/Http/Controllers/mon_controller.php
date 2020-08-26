<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mon_model;
use Session;
use App\Http\Requests\monRequest;
class mon_controller extends Controller
{
	public function view_mon(){
		$mon = mon_model::get_all();
		return view ('admin.mon',compact('mon'));
	}
	public function them_mon(){
		$nganh=mon_model::get_nganh();
		return view('admin.them_mon',compact('nganh'));
	}
	public function them_mon_xu_ly(monRequest $rq){
		$mon = new mon_model();
		$mon->ten_mon = $rq->ten_mon;
		$mon->phuong_thuc_thi = $rq->phuong_thuc_thi;
		$mon->trang_thai = $rq->trang_thai;
		$mon->ma_nganh = $rq->ma_nganh;
		$mon->process_insert();
		return redirect()->route('quan_ly_mon_hoc.view_mon');
	}
	public function sua_mon(Request $rq){
		$ma_mon = $rq->ma_mon;
		$nganh=mon_model::get_nganh();
		$mon = mon_model::get_one($ma_mon);
		return view('admin.sua_mon',compact('mon','nganh'));
	}
	public function sua_mon_xu_ly(monRequest $rq){
   	$mon = new mon_model();
   	$mon->ma_mon = $rq->ma_mon;
   	$mon->ten_mon = $rq->ten_mon;
	$mon->phuong_thuc_thi = $rq->phuong_thuc_thi;
	$mon->trang_thai = $rq->trang_thai;
	$mon->ma_nganh = $rq->ma_nganh;
   	$mon->process_update();
   	return redirect()->route('quan_ly_mon_hoc.view_mon');
   }
   public function xoa_mon(Request $rq){
   	$mon = new mon_model();
   	$mon->ma_mon = $rq->ma_mon;
   	$mon->process_delete();
   	return redirect()->route('quan_ly_mon_hoc.view_mon');
   }
}