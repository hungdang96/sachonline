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

            $table->unique('tg_ten');
            $table->primary('tg_ma');
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
