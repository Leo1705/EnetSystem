<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            if (! Schema::hasColumn('events', 'start_at')) {
                $table->dateTime('start_at')->nullable()->after('title');
            }
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('start_at');
        });
    }
};
