<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->string('dh_ma', 20);
            $table->dateTime('dh_thoiGianDatHang')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('dh_nguoiNhan', 100);
            $table->string('dh_diaChi', 250);
            $table->string('dh_dienThoai', 15);
            $table->string('dh_nguoiGui', 100);
            $table->unsignedTinyInteger('dh_daThanhToan')->default('0');
            $table->string('nv_xuLy', 20);
            $table->dateTime('dh_ngayXuLy')->default(NULL);
            $table->string('nv_giaoHang', 20);
            $table->dateTime('dh_ngayLapPhieuGiao')->default(NULL);
            $table->dateTime('dh_ngayGiaoHang')->default(NULL);
             $table->timestamp('dh_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dh_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('dh_trangThai')->default('1');
            $table->string('vc_maFK', 20);
            $table->string('tt_maFK', 20);

            $table->unique(['dh_dienThoai']);
            $table->primary('dh_ma');
            $table->foreign('nv_giaoHang')->references('nv_ma')->on('nhanvienTableSeeder')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vc_maFK')->references('vc_ma')->on('vanchuyen')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tt_maFK')->references('tt_ma')->on('thanhtoan')
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
        Schema::dropIfExists('donhang');
    }
}
