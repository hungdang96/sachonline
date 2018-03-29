<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyen', function (Blueprint $table) {
            $table->string('q_ma', 10);
            $table->string('q_ten', 30);
            $table->string('q_dienGiai', 250);
            $table->timestamp('q_tao')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('q_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('q_trangThai')->default('2');
            
            $table->unique(['q_ten']);
            $table->primary('q_ma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quyenTableSeeder');
    }
}
