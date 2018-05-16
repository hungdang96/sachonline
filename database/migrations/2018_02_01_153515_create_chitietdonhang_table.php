<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->unsignedInteger('ctdh_soLuong');
            $table->unsignedInteger('ctdh_donGia');
            $table->string('s_maFK', 80);
            $table->string('dh_maFK', 80);

            $table->foreign('s_maFK')
                ->references('s_sku')->on('sach')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dh_maFK')
                ->references('dh_ma')->on('donhang')
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
        Schema::dropIfExists('chitietdonhang');
    }
}
