<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->string('kh_ma', 20);
            $table->string('kh_taiKhoan', 50);
            $table->string('kh_matKhau', 32);
            $table->string('kh_hoTen', 100);
            $table->string('kh_gioiTinh', 5);
            $table->string('kh_email', 100);
            $table->dateTime('kh_ngaySinh')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('kh_diaChi', 250);
            $table->string('kh_soDienThoai', 15);
            $table->timestamp('kh_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('kh_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('kh_trangThai')->default('2');

            $table->unique(['kh_taiKhoan','kh_email','kh_hoTen','kh_soDienThoai']);
            $table->primary('kh_ma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
