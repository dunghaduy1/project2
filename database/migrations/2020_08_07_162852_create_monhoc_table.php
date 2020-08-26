<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonhocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mon_hoc', function (Blueprint $table) {
            $table->increments('ma_mon');
            $table->string('ten_mon',50);
            $table->boolean('trang_thai');
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
        Schema::dropIfExists('monhoc');
    }
}
