<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreakLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('break_logs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->string('lat');
            $table->string('lng');
            $table->unsignedBigInteger('time_sheet_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('break_logs');
    }
}
