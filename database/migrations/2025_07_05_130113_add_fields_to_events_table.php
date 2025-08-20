<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // allow NULL so existing rows with “0000-00-00 00:00:00” don’t break
            $table->dateTime('start_at')
                  ->nullable()
                  ->after('title');

            $table->text('description')
                  ->nullable()
                  ->after('start_at');

            $table->string('color')
                  ->default('blue')
                  ->after('description');

            $table->boolean('all_day')
                  ->default(false)
                  ->after('color');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'start_at',
                'description',
                'color',
                'all_day',
            ]);
        });
    }
};
