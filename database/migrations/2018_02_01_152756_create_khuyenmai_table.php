<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenmai', function (Blueprint $table) {
            $table->string('km_ma', 20);
            $table->string('km_ten', 200);
            $table->text('km_noiDung');
            $table->dateTime('km_batDau');
            $table->dateTime('km_ketThuc')->default(DB::raw('NULL'));
            $table->string('km_giaiTri', 50);
            $table->string('nv_nguoiLap', 20);
            $table->dateTime('km_ngayLap')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('nv_kyNhay', 20);
            $table->dateTime('km_ngayKyNhay')->default(DB::raw('NULL'));
            $table->string('nv_kyDuyet', 20);
            $table->dateTime('km_ngayDuyet')->default(DB::raw('NULL'));
            $table->timestamps('km_tao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('km_trangThai')->default('2');
            $table->timestamps('km_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->primary('km_ma');
            $table->foreign('nv_nguoiLap')->references('nv_ma')->on('nhanvien');
            $table->foreign('nv_kyNhay')->references('nv_ma')->on('nhanvien');
            $table->foreign('nv_kyDuyet')->references('nv_ma')->on('nhanvien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyenmai');
    }
}
