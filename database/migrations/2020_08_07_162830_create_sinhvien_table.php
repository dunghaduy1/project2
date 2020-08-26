<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinh_vien', function (Blueprint $table) {
            $table->increments('ma_sinh_vien');
            $table->string('ten',100);
            $table->string('email',100)->nullable();
            $table->string('so_dien_thoai',20);
            $table->string('anh_dai_dien',100)->nullable();
            $table->string('username',100);
            $table->string('password',100);
            $table->date('ngay_sinh',100);
            $table->boolean('gioi_tinh');
            $table->boolean('trang_thai');
            $table->integer('ma_lop')->unsigned();
            $table->foreign('ma_lop')->references('ma_lop')->on('lop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinhvien');
    }
}
