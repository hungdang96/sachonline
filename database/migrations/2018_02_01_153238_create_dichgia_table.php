<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDichgiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dichgia', function (Blueprint $table) {
            $table->string('dg_ma', 20);
            $table->string('dg_ten', 100);
            $table->timestamp('dg_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dg_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->unique(['dg_ten']);
            $table->primary(['dg_ma']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dichgia');
    }
}
