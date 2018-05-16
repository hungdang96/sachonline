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
            $table->string('km_ma', 80);
            $table->string('km_ten',150);
            $table->text('km_noiDung');
            $table->dateTime('km_batDau');
            $table->dateTime('km_ketThuc')->default(NULL);
            $table->string('km_giaiTri', 50);
            $table->string('nv_nguoiLap', 80);
            $table->dateTime('km_ngayLap')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('nv_kyNhay', 80);
            $table->dateTime('km_ngayKyNhay')->default(NULL);
            $table->string('nv_kyDuyet', 80);
            $table->dateTime('km_ngayDuyet')->default(NULL);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('km_trangThai')->default('1');
            

            $table->unique('km_ten');
            $table->primary('km_ma');
            $table->foreign('nv_nguoiLap')->references('nv_ma')->on('nhanvien')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_kyNhay')->references('nv_ma')->on('nhanvien')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_kyDuyet')->references('nv_ma')->on('nhanvien')
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
        Schema::dropIfExists('khuyenmai');
    }
}
