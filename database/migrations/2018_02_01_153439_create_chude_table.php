<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chude', function (Blueprint $table) {
            $table->string('cd_ma', 20);
            $table->string('cd_ten', 100);
            $table->text('cd_dienGiai');
            $table->timestamp('cd_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('cd_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('cd_trangThai')
                ->default('1');
            $table->string('s_maFK', 20);

            $table->unique(['cd_ten']);
            $table->primary(['cd_ma']);
            $table->foreign('s_maFK')
                ->references('s_ma')->on('sach')
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
        Schema::dropIfExists('chude');
    }
}
