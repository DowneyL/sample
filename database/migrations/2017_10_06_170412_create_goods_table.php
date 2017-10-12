<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('gid');
            $table->integer('goods_id')->index();
            $table->string('gname');
            $table->string('gimg');
//            $table->string('con_point');
//            $table->integer('dstock');
            $table->integer('gstock');
            $table->integer('probability');
            $table->boolean('description')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
