<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGradeColumnsToChildrenTable extends Migration
{
    public function up()
    {
        Schema::table('children', function (Blueprint $table) {
            if (! Schema::hasColumn('children', 'grade')) {
                $table->string('grade')->nullable()->after('name');
            }
            if (! Schema::hasColumn('children', 'grade_color')) {
                $table->string('grade_color')->default('green')->after('grade');
            }
            if (! Schema::hasColumn('children', 'avatar_url')) {
                $table->string('avatar_url')->nullable()->after('grade_color');
            }
        });
    }

    public function down()
    {
        Schema::table('children', function (Blueprint $table) {
            if (Schema::hasColumn('children', 'avatar_url')) {
                $table->dropColumn('avatar_url');
            }
            if (Schema::hasColumn('children', 'grade_color')) {
                $table->dropColumn('grade_color');
            }
            if (Schema::hasColumn('children', 'grade')) {
                $table->dropColumn('grade');
            }
        });
    }
}
