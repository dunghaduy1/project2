<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class nganh_model extends Model
{
 	public $ma_nganh;
 	public $ten_nganh;
 	public $nganh;
 	static function get_all(){
 		$nganh = DB::Select('Select * from nganh');
 		return $nganh;
 	}
 	public function process_insert(){
 		DB::insert("INSERT INTO nganh (ten_nganh) VALUES (?)",[
 			$this->ten_nganh
 		]);
 	}
 	static function get_one($ma_nganh){
 		$nganh = DB::Select("Select * FROM nganh where ma_nganh = ?",[
 			$ma_nganh
 		]);
 		return $nganh;
 	}
 	 public function process_update(){
    	DB::update("update nganh set ten_nganh=? where ma_nganh=?",[
    		$this->ten_nganh,
    		$this->ma_nganh
    	]);
    }
    public function process_delete(){
   		DB::delete("delete from nganh where ma_nganh=?",[
   			$this->ma_nganh
   		]);
   	}
}
