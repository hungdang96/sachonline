<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTacgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tacgia', function (Blueprint $table) {
            $table->string('tg_ma', 20);
            $table->string('tg_ten', 100);
            $table->string('tg_quocTich', 3);
            $table->timestamp('tg_tao')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('tg_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('s_maFK', 20);

            $table->unique('tg_ten');
            $table->primary('tg_ma');
            $table->foreign('s_maFK')->references('s_ma')
                ->on('sach')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tacgia');
    }
}
