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
            $table->unsignedInteger('gy_ma')->autoIncrement();
            $table->timestamp('gy_thoiGian')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('gy_noiDung');
            $table->string('s_maFK', 20);
            $table->string('kh_maFK', 20);

            $table->primary(['gy_ma']);
            $table->foreign('s_maFK')
                ->references('s_ma')->on('sach')
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
