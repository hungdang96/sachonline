<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->string('nv_ma', 10);
            $table->string('nv_taiKhoan', 50);
            $table->string('nv_matKhau', 32);
            $table->string('nv_hoTen', 100);
            $table->string('nv_gioiTinh', 5);
            $table->string('nv_email', 100);
            $table->dateTime('nv_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('nv_diaChi', 250);
            $table->string('nv_sdt', 15);
            $table->timestamps('nv_tao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps('nv_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('nv_trangThai')->default('2');
            $table->string('q_maFK', 10);
            $table->unique(['nv_email', 'nv_taiKhoan']);
            $table->primary('nv_ma');
            $table->foreign('q_maFK')->references('q_ma')->on('quyen');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
