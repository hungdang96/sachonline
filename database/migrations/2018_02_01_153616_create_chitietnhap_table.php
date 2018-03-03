<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietnhap', function (Blueprint $table) {
            $table->unsignedInteger('ctn_soLuong');
            $table->unsignedInteger('ctn_donGia');
            $table->string('s_maFK', 20);
            $table->string('pn_maFK', 20);

            $table->foreign('s_maFK')
                ->references('s_sku')->on('sach')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pn_maFK')
                ->references('pn_ma')->on('phieunhap')
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
        Schema::dropIfExists('chitietnhap');
    }
}
