<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class mon_model extends Model
{

 	public $ten_mon;
 	public $phuong_thuc_thi;
 	public $trang_thai;
 	public $ma_nganh;
 	public $mon;
 	static function get_all(){
 		$mon = DB::Select('Select * from mon_hoc');
 		return $mon;
 	}
    static function get_nganh(){
    $nganh=DB::Select("Select * FROM nganh ");
    return $nganh;
  }
 	public function process_insert(){
 		DB::insert("INSERT INTO mon_hoc (ten_mon,trang_thai,ma_nganh) VALUES (?,?,?)",[
 			$this->ten_mon,
 			$this->trang_thai,
 			$this->ma_nganh
 		]);
 	}
 	static function get_one($ma_mon){
 		$mon = DB::Select("Select * FROM mon_hoc where ma_mon = ?",[
 			$ma_mon
 		]);
 		return $mon;
 	}
 	 public function process_update(){
    	DB::update("update mon_hoc set ten_mon=?,trang_thai=?,ma_nganh=? where ma_mon=?",[
    		$this->ten_mon,
    		$this->trang_thai,
    		$this->ma_nganh,
    		$this->ma_mon

    	]);
    }
    public function process_delete(){
   		DB::delete("delete from mon_hoc where ma_mon=?",[
   			$this->ma_mon
   		]);
   	}
}
