<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChudekhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chudekhuyenmai', function (Blueprint $table) {
            $table->string('cdkm_giaTri', 10);
            $table->unsignedTinyInteger('cdkm_trangThai')
                ->default('0');
            $table->string('km_maFK', 20);
            $table->string('cd_maFK', 20);

            $table->foreign('km_maFK')
                ->references('km_ma')->on('khuyenmai')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cd_maFK')
                ->references('cd_ma')->on('chude')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chudekhuyenmai');
    }
}
