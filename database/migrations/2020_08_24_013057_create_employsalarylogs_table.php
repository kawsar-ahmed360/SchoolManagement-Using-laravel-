<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploysalarylogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employsalarylogs', function (Blueprint $table) {
            $table->id();
            $table->string('employ_id')->comment('employ_id=user_id')->nullable();
            $table->string('previous_salary')->nullable();
            $table->string('present_salary')->nullable();
       
            $table->string('increment_salary')->nullable();
            $table->string('effacted_date')->nullable();
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
        Schema::dropIfExists('employsalarylogs');
    }
}
