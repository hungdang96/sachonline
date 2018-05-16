<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGopyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gopy', function (Blueprint $table) {
            $table->string('gy_ma',80);
            $table->timestamp('gy_thoiGian')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('gy_noiDung');
            $table->string('s_maFK', 80);
            $table->unsignedInteger('kh_maFK');

            $table->foreign('s_maFK')
                ->references('s_sku')->on('sach')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kh_maFK')
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
        Schema::dropIfExists('gopy');
    }
}
