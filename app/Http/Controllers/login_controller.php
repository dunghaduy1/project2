<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\login_model;
use Session;
class login_controller extends Controller
{
     public function login(){
        return view('admin.login');
    }
    public function login_process(Request $rq){
        $username = $rq->username;
        $password = $rq->password;
        $user = login_model::login_process($username,$password);
        // dd($user);
        if(count($user) == 1){
            $rq->session()->put('ten',$user[0]->ten);
            return redirect()->route('quan_ly_sinh_vien.view_sinh_vien');

        }
        else{
            return redirect()->route('admin.login')->with('error','tài khoản không tồn tại');
        }
    }
    public function logout(Request $rq){
        $rq->session()->flush();
        return redirect()->route('admin.login')->with('error','Đăng xuất thành công');
    }
}
