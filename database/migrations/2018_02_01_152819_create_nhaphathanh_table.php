<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhaphathanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhaphathanh', function (Blueprint $table) {
            $table->string('nph_ma', 20);
            $table->string('nph_ten', 200);
            $table->string('nph_daiDien', 100);
            $table->string('nph_diaChi', 250);
            $table->string('nph_dienThoai', 15);
            $table->string('nph_email', 100);
            $table->timestamps('nph_tao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps('nph_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('nph_trangThai')->default('2');
            $table->unique(['nhp_email']);
            $table->primary('nph_ma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhaphathanh');
    }
}
