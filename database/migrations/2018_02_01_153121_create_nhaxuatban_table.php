<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhaxuatbanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhaxuatban', function (Blueprint $table) {
            $table->string('nxb_ma', 20);
            $table->string('nxb_ten', 100);
            $table->string('nxb_diaChi', 250);

            $table->primary('nxb_ma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhaxuatban');
    }
}
