<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToEventsTable extends Migration
{
    public function up()
{
    Schema::table('events', function (Blueprint $table) {
        // only add if the column doesn’t already exist:
        if (! Schema::hasColumn('events','start_at')) {
            $table->dateTime('start_at')->after('title');
        }
        if (! Schema::hasColumn('events','description')) {
            $table->text('description')->nullable()->after('start_at');
        }
        if (! Schema::hasColumn('events','color')) {
            $table->string('color')->default('blue')->after('description');
        }
        if (! Schema::hasColumn('events','all_day')) {
            $table->boolean('all_day')->default(false)->after('color');
        }
        // user_id was already added by your previous migration, so we skip it here
    });
}


    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['start_at','description','color','all_day']);
            // if you really need to roll back, you could re-create date/time here
        });
    }
}
