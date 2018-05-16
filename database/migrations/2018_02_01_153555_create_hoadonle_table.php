<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonle', function (Blueprint $table) {
            $table->string('hdl_ma', 80);
            $table->string('hdl_nguoiMuaHang',80);
            $table->string('hdl_dienThoai', 15);
            $table->string('hdl_diaChi', 250);
            $table->string('nv_lapHoaDon', 80);
            $table->dateTime('hdl_ngayXuatHoaDon')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('dh_maFK', 80);

            $table->primary(['hdl_ma']);
            $table->foreign('dh_maFK')
                ->references('dh_ma')->on('donhang')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_lapHoaDon')
                ->references('nv_ma')->on('nhanvien')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('hdl_nguoiMuaHang')
                ->references('kh_ma')->on('khachhang')
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
        Schema::dropIfExists('hoadonle');
    }
}
