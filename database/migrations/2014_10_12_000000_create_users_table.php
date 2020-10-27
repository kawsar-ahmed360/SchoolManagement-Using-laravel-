<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userType')->nullable();
            $table->string('name')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('religion')->nullable();
            $table->string('id_no')->nullable();
            $table->string('code')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->date('join_date')->nullable();
            $table->string('designation_id')->nullable();
            $table->string('selary')->nullable();
            $table->string('number')->nullable();
            $table->string('user_roll')->nullable()->comment('1=admin,2=student,3=employ,4=computer_operator');
            $table->string('address')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at');
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
