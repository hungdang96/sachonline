<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->string('tt_ma', 20);
            $table->string('tt_ten', 150);
            $table->string('tt_dienGiai', 100);
            $table->timestamps('tt_tao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps('tt_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('tt_trangThai')->default('2');
            $table->string('dh_maFK', 20);

            $table->primary('tt_ma');
            $table->foreign('dh_maFK')->references('dh_ma')->on('donhang')
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
        Schema::dropIfExists('thanhtoan');
    }
}
