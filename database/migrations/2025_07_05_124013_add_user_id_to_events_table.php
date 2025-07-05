<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // after('id') is optional—just ensures user_id comes right after your primary key
            $table->foreignId('user_id')
                  ->after('id')
                  ->constrained()
                  ->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });
    }
};
