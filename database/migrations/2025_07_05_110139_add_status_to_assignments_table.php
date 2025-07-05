<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::table('assignments', function (Blueprint $table) {
            if (! Schema::hasColumn('assignments', 'status')) {
                $table->string('status')->default('pending')->after('due_at');
            }
        });
    }

    public function down()
    {
        Schema::table('assignments', function (Blueprint $table) {
            if (Schema::hasColumn('assignments', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
}
