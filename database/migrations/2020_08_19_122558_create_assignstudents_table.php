<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignstudents', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->comment('student_id=user_id');
            $table->string('class_id');
            $table->string('shift_id')->nullable();
            $table->string('group_id')->nullable();
            $table->string('roll')->nullable();
            $table->string('session_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignstudents');
    }
}
