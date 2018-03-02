<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sach', function (Blueprint $table) {
            $table->string('s_sku', 20);
            $table->string('s_ten', 100);
            $table->unsignedInteger('s_giaGoc');
            $table->unsignedInteger('s_giaBan');
            $table->unsignedInteger('s_soTrang');
            $table->dateTime('s_namXuatBan');
            $table->timestamp('s_tao')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('s_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('s_kichThuoc', 10);
            $table->unsignedInteger('s_danhGia');
            $table->string('s_loaiBia', 10);
            $table->unsignedSmallInteger('s_trangThai')
                ->default('1');
            $table->text('s_gioiThieu');
            $table->string('nxb_maFK', 20);
            $table->string('l_maFK', 20);
            $table->string('nn_maFK', 20);

            $table->primary('s_sku');
            $table->foreign('nxb_maFK')->references('nxb_ma')
                ->on('nhaxuatban')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nxb_maFK')->references('nxb_ma')
                ->on('nhaxuatban')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nxb_maFK')->references('nxb_ma')
                ->on('nhaxuatban')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sach');
    }
}
