<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanchuyen', function (Blueprint $table) {
            $table->string('vc_ma', 20);
            $table->string('vc_ten', 200);
            $table->unsignedInteger('vc_chiPhi')->default('0');
            $table->text('vc_dienGiai');
            $table->timestamps('vc_tao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps('vc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('vc_trangThai')->default('2');
            $table->primary('vc_ma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vanchuyen');
    }
}
