<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateAndTimeToEventsTable extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // after user_id, insert date
            $table->date('date')->after('user_id');
            // then time (nullable)
            $table->time('time')->nullable()->after('date');
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['date', 'time']);
        });
    }
}
