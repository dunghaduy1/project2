<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
	Route::get('','login_controller@login')->name('login');
	Route::post('login_xu_ly','login_controller@login_process')->name('login_xu_ly');
	Route::get('logout','login_controller@logout')->name('logout');
});

Route::group(['prefix'=>'quan_ly_diem','as'=>'quan_ly_diem.','middleware'=>['abc']],function(){
	Route::get('view_diem','diem_controller@view_diem')->name('view_diem');
	Route::get('them_diem','diem_controller@them_diem')->name('them_diem');
	Route::get('load_lop','diem_controller@load_lop')->name('load_lop');
	Route::get('load_mon','diem_controller@load_mon')->name('load_mon');
	Route::get('load_diem','diem_controller@load_diem')->name('load_diem');
	Route::get('load_them_diem','diem_controller@load_them_diem')->name('load_them_diem');
	Route::post('process_update','diem_controller@process_update')->name('process_update');
	Route::post('them_diem_xu_ly','diem_controller@them_diem_xu_ly')->name('them_diem_xu_ly');
	Route::get('update_diem','diem_controller@update_diem')->name('update_diem');


});

Route::group(['prefix'=>'quan_ly_mon_hoc','as'=>'quan_ly_mon_hoc.','middleware'=>['abc']],function(){
	Route::get('view_mon','mon_controller@view_mon')->name('view_mon');
	Route::get('them_mon','mon_controller@them_mon')->name('them_mon');
	Route::post('them_mon_xu_ly','mon_controller@them_mon_xu_ly')->name('them_mon_xu_ly');
	Route::get('sua_mon/{ma_mon}','mon_controller@sua_mon')->name('sua_mon');
	Route::post('sua_mon_xu_ly/{ma_mon}','mon_controller@sua_mon_xu_ly')->name('sua_mon_xu_ly');
	Route::get('xoa_mon/{ma_mon}','mon_controller@xoa_mon')->name('xoa_mon');
});

Route::group(['prefix'=>'quan_ly_lop','as'=>'quan_ly_lop.','middleware'=>['abc']],function(){
	Route::get('view_lop','lop_controller@view_lop')->name('view_lop');
	Route::get('them_lop','lop_controller@them_lop')->name('them_lop');
	Route::post('them_lop_xu_ly','lop_controller@them_lop_xu_ly')->name('them_lop_xu_ly');
	Route::get('sua_lop/{ma_lop}','lop_controller@sua_lop')->name('sua_lop');
	Route::post('sua_lop_xu_ly/{ma_lop}','lop_controller@sua_lop_xu_ly')->name('sua_lop_xu_ly');
	Route::get('xoa_lop/{ma_lop}','lop_controller@xoa_lop')->name('xoa_lop');	
});

Route::group(['prefix'=>'quan_ly_khoa','as'=>'quan_ly_khoa.','middleware'=>['abc']],function(){
	Route::get('view_khoa','khoa_controller@view_khoa')->name('view_khoa');
	Route::get('them_khoa','khoa_controller@them_khoa')->name('them_khoa');
	Route::post('them_khoa_xu_ly','khoa_controller@them_khoa_xu_ly')->name('them_khoa_xu_ly');
	Route::get('sua_khoa/{ma_khoa}','khoa_controller@sua_khoa')->name('sua_khoa');
	Route::post('sua_khoa_xu_ly/{ma_khoa}','khoa_controller@sua_khoa_xu_ly')->name('sua_khoa_xu_ly');
	Route::get('xoa_khoa/{ma_khoa}','khoa_controller@xoa_khoa')->name('xoa_khoa');	
});


Route::group(['prefix'=>'quan_ly_nganh','as'=>'quan_ly_nganh.','middleware'=>['abc']],function(){
	Route::get('view_nganh','nganh_controller@view_nganh')->name('view_nganh');
	Route::get('them_nganh','nganh_controller@them_nganh')->name('them_nganh');
	Route::post('them_nganh_xu_ly','nganh_controller@them_nganh_xu_ly')->name('them_nganh_xu_ly');
	Route::get('sua_nganh/{ma_nganh}','nganh_controller@sua_nganh')->name('sua_nganh');
	Route::post('sua_nganh_xu_ly/{ma_nganh}','nganh_controller@sua_nganh_xu_ly')->name('sua_nganh_xu_ly');
	Route::get('xoa_nganh/{ma_nganh}','nganh_controller@xoa_nganh')->name('xoa_nganh');
});


Route::group(['prefix'=>'quan_ly_sinh_vien','as'=>'quan_ly_sinh_vien.','middleware'=>['abc']],function(){
	Route::get('view_sinh_vien','sinh_vien_controller@view_sinh_vien')->name('view_sinh_vien');
	Route::get('get_sinh_vien_by_lop','sinh_vien_controller@get_sinh_vien_by_lop')->name('get_sinh_vien_by_lop');
	Route::get('them_sinh_vien','sinh_vien_controller@them_sinh_vien')->name('them_sinh_vien');
	Route::post('them_sinh_vien_xu_ly','sinh_vien_controller@them_sinh_vien_xu_ly')->name('them_sinh_vien_xu_ly');
	Route::get('sua_sinh_vien','sinh_vien_controller@sua_sinh_vien')->name('sua_sinh_vien');
	Route::post('sua_sinh_vien_xu_ly/{ma_sinh_vien}','sinh_vien_controller@sua_sinh_vien_xu_ly')->name('sua_sinh_vien_xu_ly');
	Route::get('khoa_sinh_vien/{ma_sinh_vien}','sinh_vien_controller@khoa_sinh_vien')->name('khoa_sinh_vien');
	Route::get('xoa_sinh_vien/{ma_sinh_vien}','sinh_vien_controller@xoa_sinh_vien')->name('xoa_sinh_vien');
	Route::get('them_sinh_vien_excel','sinh_vien_controller@them_sinh_vien_excel')->name('them_sinh_vien_excel');
	Route::post('importExcel','sinh_vien_controller@importExcel')->name('importExcel');
	Route::get('load_lop','sinh_vien_controller@load_lop')->name('load_lop');

	
});