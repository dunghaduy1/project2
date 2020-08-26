<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diem', function (Blueprint $table) {
            $table->float('diem_lan_mot',50)->nullable();
            $table->float('diem_lan_hai',50)->nullable();
            $table->boolean('trang_thai');
            $table->integer('ma_sinh_vien')->unsigned();
            $table->foreign('ma_sinh_vien')->references('ma_sinh_vien')->on('sinh_vien');
            $table->integer('ma_mon')->unsigned();
            $table->foreign('ma_mon')->references('ma_mon')->on('mon_hoc');
            $table->primary(['ma_sinh_vien','ma_mon']);
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diem');
    }
}
