<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingFieldsToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::table('events', function (Blueprint $table) {
        // only add if they truly don’t exist yet:
        if (! Schema::hasColumn('events','date')) {
            $table->date('date')->after('title');
        }
        if (! Schema::hasColumn('events','time')) {
            $table->time('time')->nullable()->after('date');
        }
        if (! Schema::hasColumn('events','description')) {
            $table->text('description')->nullable()->after('time');
        }
        if (! Schema::hasColumn('events','color')) {
            $table->string('color')->default('blue')->after('description');
        }
        if (! Schema::hasColumn('events','user_id')) {
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->after('color');
        }
    });
}

public function down()
{
    Schema::table('events', function (Blueprint $table) {
        // drop in reverse order
        if (Schema::hasColumn('events','user_id')) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        }
        if (Schema::hasColumn('events','color')) {
            $table->dropColumn('color');
        }
        if (Schema::hasColumn('events','description')) {
            $table->dropColumn('description');
        }
        if (Schema::hasColumn('events','time')) {
            $table->dropColumn('time');
        }
        if (Schema::hasColumn('events','date')) {
            $table->dropColumn('date');
        }
    });
}

}
