<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class khoa_model extends Model
{
 	public $ma_khoa;
 	public $ten_khoa;
 	public $khoa;
 	static function get_all(){
 		$khoa = DB::Select('Select * from khoa');
 		return $khoa;
 	}
 	public function process_insert(){
 		DB::insert("INSERT INTO khoa (ten_khoa) VALUES (?)",[
 			$this->ten_khoa
 		]);
 	}
 	static function get_one($ma_khoa){
 		$khoa = DB::Select("Select * FROM khoa where ma_khoa = ?",[
 			$ma_khoa
 		]);
 		return $khoa;
 	}
 	 public function process_update(){
    	DB::update("update khoa set ten_khoa=? where ma_khoa=?",[
    		$this->ten_khoa,
    		$this->ma_khoa
    	]);
    }
    public function process_delete(){
   		DB::delete("delete from khoa where ma_khoa=?",[
   			$this->ma_khoa
   		]);
   	}
}
