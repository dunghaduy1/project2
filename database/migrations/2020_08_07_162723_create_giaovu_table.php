<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiaovuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giao_vu', function (Blueprint $table) {
            $table->increments('ma_giaovu');
            $table->string('ten',100);
            $table->string('anh_dai_dien',100);
            $table->string('email',100);
            $table->string('so_dien_thoai',20);
            $table->string('username',100);
            $table->string('password',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giaovu');
    }
}
