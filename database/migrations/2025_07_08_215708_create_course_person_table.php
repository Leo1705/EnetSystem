<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // only create if it doesn’t already exist
        if (! Schema::hasTable('course_person')) {
            Schema::create('course_person', function (Blueprint $table) {
                $table->unsignedBigInteger('person_id');
                $table->unsignedBigInteger('course_id');

                // point at the correct tables
                $table->foreign('person_id')
                      ->references('id')
                      ->on('persons')
                      ->onDelete('cascade');

                $table->foreign('course_id')
                      ->references('id')
                      ->on('courses')
                      ->onDelete('cascade');

                // make the two‐column combo the primary key
                $table->primary(['person_id', 'course_id']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('course_person');
    }
};
