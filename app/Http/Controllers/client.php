<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client_model;
use Session;
use Exception;
use App\Http\Requests\clientRequest;
class client extends Controller
{
	public function login(){
		return view ('student.view_diem');
	}
	public function load_diem(Request $request){
		$email = $request->email;
		$so_dien_thoai = $request->so_dien_thoai;
		$sinh_vien= client_model::get_sinh_vien_by_email_sdt($email,$so_dien_thoai);
		$diem = client_model::get_diem_by_email_sdt($email,$so_dien_thoai);
		if(count($sinh_vien) == 1){
            return view ('student.diem', compact('diem','sinh_vien')); 
        }
        else{
            return redirect()->route('login')->with('error','Thông tin không đúng');
        }		    
  
	}
}
