<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTextToAnnouncementsTable extends Migration
{
    public function up()
    {
        Schema::table('announcements', function (Blueprint $table) {
            if (! Schema::hasColumn('announcements', 'text')) {
                $table->text('text')->nullable()->default('')->after('id');
            }
        });
    }

    public function down()
    {
        Schema::table('announcements', function (Blueprint $table) {
            if (Schema::hasColumn('announcements', 'text')) {
                $table->dropColumn('text');
            }
        });
    }
}
