<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username');
            $table->string('forename');
            $table->string('surname');
            $table->string('email');
            $table->string('password');
            $table->string('type')->default('');
            $table->tinyInteger('department_id')->default(1);
            $table->tinyInteger('is_active')->default('1');
            $table->timestamp('last_login_at');
            $table->string('activation_key')->default('');
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
