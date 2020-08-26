<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lop_model;
use Session;
use App\Http\Requests\lopRequest;
class lop_controller extends Controller
{
    public function view_lop(){
		$lop = lop_model::get_all();
		return view ('admin.lop',compact('lop'));
	}
	public function them_lop(){
		$khoa = lop_model::get_khoa();
		$nganh = lop_model::get_nganh();
		return view ('admin.them_lop',compact('khoa','nganh'));
	}
	public function them_lop_xu_ly(lopRequest $rq){
		$lop = new lop_model();
		$lop->ten_lop = $rq->ten_lop;
		$lop->ma_khoa = $rq->ma_khoa;
		$lop->ma_nganh = $rq->ma_nganh;
		$lop->process_insert();
		return redirect()->route('quan_ly_lop.view_lop');
	}
	public function sua_lop(Request $rq){
		$ma_lop = $rq->ma_lop;
		$lop = lop_model::get_one($ma_lop);
		$khoa = lop_model::get_khoa();
		$nganh = lop_model::get_nganh();
		return view('admin.sua_lop',compact('lop','khoa','nganh'));
	}
	public function sua_lop_xu_ly(lopRequest $rq){
   	$lop = new lop_model();
   	$lop->ma_lop = $rq->ma_lop;
   	$lop->ten_lop = $rq->ten_lop;
   	$lop->ma_khoa = $rq->ma_khoa;
   	$lop->ma_nganh = $rq->ma_nganh;
   	$lop->process_update();
   	return redirect()->route('quan_ly_lop.view_lop');
   }
   public function xoa_lop(Request $rq){
   	$lop = new lop_model();
   	$lop->ma_lop = $rq->ma_lop;
   	$lop->process_delete();
   	return redirect()->route('quan_ly_lop.view_lop');
   }
}
