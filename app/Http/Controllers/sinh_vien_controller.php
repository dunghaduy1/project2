<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sinh_vien_model;
use App\Http\Requests\sinhVienRequest;
use App\Imports\sinhVienImport;
use Maatwebsite\Excel\Facades\Excel;
class sinh_vien_controller extends Controller
{
	public function view_sinh_vien(){
		$khoa = sinh_vien_model::get_khoa();
		$nganh = sinh_vien_model::get_nganh();
		$sinh_vien = sinh_vien_model::get_all();
		return view ('admin.sinh_vien',compact('sinh_vien','khoa','nganh'));
	}
	public function them_sinh_vien(){
		$lop=sinh_vien_model::get_lop();
		return view('admin.them_sinh_vien',compact('lop'));
	}
	public function them_sinh_vien_xu_ly(sinhVienRequest $rq){
		$sinh_vien = new sinh_vien_model();
		$sinh_vien->ten = $rq->ten;
		$sinh_vien->email = $rq->email;
		$sinh_vien->ngay_sinh = $rq->ngay_sinh;
		$sinh_vien->so_dien_thoai = $rq->so_dien_thoai;
		$sinh_vien->gioi_tinh = $rq->gioi_tinh;
		$sinh_vien->ma_lop = $rq->ma_lop;
		$sinh_vien->trang_thai = $rq->trang_thai;
		try{
			$sinh_vien->process_insert();
		}
		catch(Exception $e){
			return redirect()->route('quan_ly_sinh_vien.them_sinh_vien')->with('error', 'Thêm sinh viên thất bại');
		}
		return redirect()->route('quan_ly_sinh_vien.them_sinh_vien')->with('success', 'Thêm sinh viên thành công');	
	
	}
	public function sua_sinh_vien(Request $rq){
		$ma_sinh_vien = $rq->ma_sinh_vien;
		$sinh_vien = sinh_vien_model::get_one($ma_sinh_vien);
		$lop = sinh_vien_model::get_lop();
		return view('admin.sua_sinh_vien',compact('sinh_vien','lop'));
	}
	public function sua_sinh_vien_xu_ly(sinhVienRequest $rq){
   	$sinh_vien = new sinh_vien_model();
   	$sinh_vien->ma_sinh_vien = $rq->ma_sinh_vien;
		$sinh_vien->ten = $rq->ten;
		$sinh_vien->email = $rq->email;
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
   public function load_lop(Request $request){
		$ma_khoa = $request->ma_khoa;
		$ma_nganh = $request->ma_nganh;
		$lop = sinh_vien_model::get_lop_by_nganh_khoa($ma_khoa,$ma_nganh);
		$output = '<option value="0">-Chọn-</option>';
        foreach($lop as $each)
        {
           $output .= "<option value='$each->ma_lop'>$each->ten_lop</option>";
       	}
        echo $output;
	}
	public function get_sinh_vien_by_lop(Request $request){
    $ma_lop = $request->ma_lop;

    $sinh_vien = sinh_vien_model::get_sinh_vien_by_lop($ma_lop);
    return $sinh_vien;        
  }
  function them_sinh_vien_excel(){
  	return view ('admin.them_sinh_vien_excel');
  }
  public function importExcel() 
    {
        Excel::import(new sinhVienImport,request()->file('excel'));
           
        return back();
    }

    public function kt_email(Request $request){
		$email = $request->email;
		$email = sinh_vien_model::kt_email($email);
		if(count($email) == 1){
			$output="Email đã tồn tại";
		}
		else{
			$output="Email có thể sử dụng";
		}
		echo $output;
	}
	public function kt_sdt(Request $request){
		$so_dien_thoai = $request->so_dien_thoai;
		$sdt = sinh_vien_model::kt_sdt($so_dien_thoai);
		if(count($sdt) == 1){
			$output="Số điện thoại đã tồn tại";
		}
		else{
			$output="Số điện thoại có thể sử dụng";
		}
		echo $output;
	}
}