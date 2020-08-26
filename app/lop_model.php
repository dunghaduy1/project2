<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class lop_model extends Model
{
 	public $ma_lop;
 	public $ten_lop;
 	public $ma_khoa;
 	public $ma_nganh;
 	public $lop;
 	static function get_all(){
 		$lop = DB::Select('SELECT lop.ma_lop,lop.ten_lop,nganh.ten_nganh,khoa.ten_khoa 
      FROM ((lop
      INNER JOIN nganh ON lop.ma_nganh=nganh.ma_nganh)
      INNER JOIN khoa ON lop.ma_khoa=khoa.ma_khoa)');
 		return $lop;
 	}
 	public function process_insert(){
 		DB::insert("INSERT INTO lop (ten_lop,ma_khoa,ma_nganh) VALUES (?,?,?)",[
 			$this->ten_lop,
 			$this->ma_khoa,
 			$this->ma_nganh
 		]);
 	}
    static function get_khoa(){
    $khoa=DB::Select("Select * FROM khoa ");
    return $khoa;
  }
    static function get_nganh(){
    $nganh=DB::Select("Select * FROM nganh ");
    return $nganh;
  }
 	static function get_one($ma_lop){
 		$lop = DB::Select("Select * FROM lop where ma_lop = ?",[
 			$ma_lop
 		]);
 		return $lop;
 	}
 	 public function process_update(){
    	DB::update("update lop set ten_lop=?,ma_khoa=?,ma_nganh=? where ma_lop=?",[
    		$this->ten_lop,
    		$this->ma_khoa,
    		$this->ma_nganh,
    		$this->ma_lop
    	]);
    }
    public function process_delete(){
   		DB::delete("delete from lop where ma_lop=?",[
   			$this->ma_lop
   		]);
   	}
}
