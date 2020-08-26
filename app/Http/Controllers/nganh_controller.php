<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nganh_model;
use Session;
use App\Http\Requests\NganhRequest;
class nganh_controller extends Controller
{
	public function view_nganh(){
		$nganh = nganh_model::get_all();
		return view ('admin.nganh',compact('nganh'));
	}
	public function them_nganh(){
		return view ('admin.them_nganh');
	}
	public function them_nganh_xu_ly(NganhRequest $rq){
		$nganh = new nganh_model();
		$nganh->ten_nganh = $rq->ten_nganh;
		$nganh->process_insert();
		return redirect()->route('quan_ly_nganh.view_nganh');
	}
	public function sua_nganh(Request $rq){
		$ma_nganh = $rq->ma_nganh;
		$nganh = nganh_model::get_one($ma_nganh);
		return view('admin.sua_nganh',compact('nganh'));
	}
	public function sua_nganh_xu_ly(Request $rq){
   	$nganh = new nganh_model();
   	$nganh->ma_nganh = $rq->ma_nganh;
   	$nganh->ten_nganh = $rq->ten_nganh;
   	$nganh->process_update();
   	return redirect()->route('quan_ly_nganh.view_nganh');
   }
   public function xoa_nganh(Request $rq){
   	$nganh = new nganh_model();
   	$nganh->ma_nganh = $rq->ma_nganh;
   	$nganh->process_delete();
   	return redirect()->route('quan_ly_nganh.view_nganh');
   }
   public function store(NganhRequest $request){
	  $ten_nganh = $request->input('ten_nganh');

	}
}