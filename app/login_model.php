<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class login_model extends Model
{
	public $ten;
	public $user;
	public $username;
	public $password;
    static function login_process($username,$password){
        $user = DB::select("select * from giao_vu where username = ? and password = ?",[
            $username,
            $password
        ]);
        return $user;
    }
}
