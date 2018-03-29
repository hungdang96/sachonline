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
            $table->string('hdl_ma', 20);
            $table->string('hdl_nguoiMuaHang', 50);
            $table->string('hdl_dienThoai', 15);
            $table->string('hdl_diaChi', 250);
            $table->string('nv_lapHoaDon', 20);
            $table->dateTime('hdl_ngayXuatHoaDon')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('dh_maFK', 20);

            $table->primary(['hdl_ma']);
            $table->foreign('dh_maFK')
                ->references('dh_ma')->on('donhang')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_lapHoaDon')
                ->references('nv_ma')->on('nhanvienTableSeeder')
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
