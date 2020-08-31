<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\diem_model;
use Session;
use Exception;
use App\Http\Requests\diemRequest;
class diem_controller extends Controller
{
	public function view_diem(){
		$khoa = diem_model::get_khoa();
		$nganh = diem_model::get_nganh();
		$diem = diem_model::get_all();
		return view ('admin.diem',compact('diem','khoa','nganh'));
	}
	public function them_diem(){
		$khoa = diem_model::get_khoa();
		$nganh = diem_model::get_nganh();

		return view ('admin.them_diem',compact('khoa','nganh'));
	}
	public function load_lop(Request $request){
		$ma_khoa = $request->ma_khoa;
		$ma_nganh = $request->ma_nganh;
		$lop = diem_model::get_lop_by_nganh_khoa($ma_khoa,$ma_nganh);
		$output = '<option value="0">-Chọn-</option>';
        foreach($lop as $each)
        {
           $output .= "<option value='$each->ma_lop'>$each->ten_lop</option>";
       	}
        echo $output;
	}
	public function load_mon(Request $rq){
		$ma_nganh  = $rq->ma_nganh;
		$mon = diem_model::get_mon_by_nganh($ma_nganh);
		$output = '<option value="0">-Chọn-</option>';
		foreach($mon as $each)
        {
           $output .= "<option value='$each->ma_mon'>$each->ten_mon</option>";
       }
        echo $output;
	}
		public function load_diem(Request $request){
		$ma_khoa = $request->ma_khoa;
		$ma_nganh = $request->ma_nganh;
		$ma_lop = $request->ma_lop;
		$ma_mon = $request->ma_mon;

		$diem = diem_model::get_diem_by_lop_mon($ma_lop,$ma_mon);
        $output='';
		foreach ($diem as $each){
			$output .='
			<form action="" method="POST"> 
			<tr>
		  		<td> '.$each->ma_sinh_vien.' </td>
		  		<td> '.$each->ten.' </td>
		  		<td> '.$each->ngay_sinh.' </td>
		  		<td> <input type="text" data-ma_sinh_vien="'. $each->ma_sinh_vien.'" data-lan="1" class="form-control input_diem"  value="'.$each->diem_lan_mot.'"> </td>
		  		<td> <input type="text" data-ma_sinh_vien="'. $each->ma_sinh_vien.'" data-lan="2"  class="form-control input_diem" value="'.$each->diem_lan_hai.'"> </td>
		  		<td> '.$each->kieu_thi.' </td>
		  		</tr>
		  	</form>
	  		';
	    }
	  	echo $output;        
	}
	public function load_them_diem(Request $request){
		$ma_lop = $request->ma_lop;
		$ma_mon = $request->ma_mon;

		$diem = diem_model::get_sv_by_lop($ma_lop,$ma_mon);
        $output="";
		foreach ($diem as $each){
			$output .='<tr>
		  		<td> '.$each->ma_sinh_vien.' </td>
		  		<td> '.$each->ten.' </td>
		  		<td> '.$each->ngay_sinh.' </td>
		  		<td><input type="text" id="" name="diem['.$each->ma_sinh_vien.'][1]" class="form-control"></td>
		  		<td><input type="text" id="" name="diem['.$each->ma_sinh_vien.'][2]" class="form-control"></td>
		  		<td><select name="kieu_thi['.$each->ma_sinh_vien.']" id="" class="form-control">
		  				<option value="1">Lý thuyết</option>
		  				<option value="2">Thực Hành</option>
		  			</select>
		  		</td>
		  		</tr>
	  		';
	    }
	  	echo $output;        
	}
	public function them_diem_xu_ly(Request $rq){
		$diem = new diem_model();
		$array_diem = $rq->diem;
		$diem->ma_mon = $rq->ma_mon;
		foreach ($array_diem as $ma_sinh_vien => $value) {
			$diem->ma_sinh_vien = $ma_sinh_vien;
			foreach ($value as $lan_thi => $diem_thi) {
				$diem->lan_thi = $lan_thi;
				$diem->diem_lan_mot = $value[1];
				$diem->diem_lan_hai = $value[2];
				$diem->kieu_thi = $rq->kieu_thi[$ma_sinh_vien];
				try{
					$diem->process_insert();
				}
				catch(Exception $e){

				}
			}
		}

		return redirect()->route('quan_ly_diem.view_diem');
	}

	public function update_diem(Request $rq)
	{
		$diem = new diem_model();
		$diem->ma_sinh_vien = $rq->ma_sinh_vien;
		$diem->ma_mon = $rq->ma_mon;
		$diem->lan = $rq->lan;
		$diem->diem = $rq->diem;
		if($diem->lan==1){
			$diem->update_diem_mot();
		};
		if($diem->lan==2){
			$diem->update_diem_();
		};

	}

	

}
