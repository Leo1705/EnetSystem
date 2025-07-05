<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('course_id');
        $table->unsignedBigInteger('user_id');
        $table->string('title');
        $table->text('description')->nullable();
        $table->timestamp('due_at');
        $table->timestamps();

        $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        $table->foreign('user_id'  )->references('id')->on('users'  )->onDelete('cascade');
    });
    }

    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
