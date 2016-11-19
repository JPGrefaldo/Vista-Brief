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
            $table->string('username', 200);
            $table->string('forename', 50);
            $table->string('surname', 50);
            $table->string('email', 200);
            $table->string('password', 255);
            $table->string('avatar', 200)->default('default.png');
            $table->tinyInteger('type')->default('2'); /* 1=admin; 2=regular*/
            $table->tinyInteger('is_active')->default('1');
            $table->string('activation_key', 100)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
    // password: qwqwqw = $2y$10$efGa1isY3AC4Tk0Sv3JenOK5Ngwi/rYQ9XDVHh/IjQ1dH1m.VEL0u

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
