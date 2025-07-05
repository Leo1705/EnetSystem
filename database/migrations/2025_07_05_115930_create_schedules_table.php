<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();
        $table->date('date');
        $table->string('slot')->nullable();         // e.g. "1", "2", "A/B"…
        $table->string('subject');
        $table->unsignedSmallInteger('attended');  // how many attended
        $table->unsignedSmallInteger('capacity');  // max students
        $table->time('start_time')->nullable();
        $table->time('end_time')->nullable();
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
        Schema::dropIfExists('schedules');
    }
}
