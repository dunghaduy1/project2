<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop', function (Blueprint $table) {
            $table->increments('ma_lop');
            $table->string('ten_lop',100);
            $table->integer('ma_khoa')->unsigned();
            $table->foreign('ma_khoa')->references('ma_khoa')->on('khoa');
            $table->integer('ma_nganh')->unsigned();
            $table->foreign('ma_nganh')->references('ma_nganh')->on('nganh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lop');
    }
}
