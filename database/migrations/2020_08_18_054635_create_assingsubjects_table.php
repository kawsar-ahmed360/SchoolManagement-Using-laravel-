<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssingsubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assingsubjects', function (Blueprint $table) {
            $table->id();
            $table->string('class_id');
            $table->string('subject_id');
            $table->string('full_mark');
            $table->string('pass_mark');
            $table->string('get_mark');
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
        Schema::dropIfExists('assingsubjects');
    }
}
