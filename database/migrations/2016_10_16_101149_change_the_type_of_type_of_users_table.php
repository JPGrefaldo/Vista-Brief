<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTheTypeOfTypeOfUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('users', function (Blueprint $table) {
            // $table->tinyInteger('type')->default(2)->change();
        // });
        DB::statement('ALTER TABLE users MODIFY type TINYINT DEFAULT 2');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->string('type')->default('2')->change();
        // });
        DB::statement('ALTER TABLE users MODIFY type VARCHAR DEFAULT 2');
    }
}
