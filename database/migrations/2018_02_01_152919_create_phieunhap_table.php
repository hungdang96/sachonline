<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieunhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieunhap', function (Blueprint $table) {
            $table->string('pn_ma', 80);
            $table->string('pn_nguoiGiao', 80);
            $table->string('pn_soHoaDon', 15);
            $table->dateTime('pn_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('nv_nguoiLapPhieu', 80);
            $table->dateTime('pn_ngayNhapPhieu')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('nv_keToan', 80);
            $table->dateTime('pn_ngayXacNhan')->default(NULL);
            $table->string('nv_thuKho', 80);
            $table->dateTime('pn_ngayNhapKho')->default(NULL);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('pn_trangThai')->default('1');
            $table->string('nph_maFK', 80);

            $table->primary('pn_ma');
            $table->foreign('nph_maFK')->references('nph_ma')->on('nhaphathanh')
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
        Schema::dropIfExists('phieunhap');
    }
}
