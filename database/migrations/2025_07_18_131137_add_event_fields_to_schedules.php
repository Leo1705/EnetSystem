<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventFieldsToSchedules extends Migration
{
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            if (! Schema::hasColumn('schedules','recurrence')) {
            $table->string('recurrence')->nullable()->after('all_day');
        }
            if (! Schema::hasColumn('schedules','description')) {
                $table->text('description')->nullable()->after('subject');
            }
            if (! Schema::hasColumn('schedules','color')) {
                $table->string('color')->default('blue')->after('description');
            }
            if (! Schema::hasColumn('schedules','all_day')) {
                $table->boolean('all_day')->default(false)->after('color');
            }
            if (! Schema::hasColumn('schedules','recurrence')) {
                $table->string('recurrence')->nullable()->after('all_day');
            }
        });
    }

    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn([
                'description','color','all_day','recurrence'
            ]);
        });
    }
}
