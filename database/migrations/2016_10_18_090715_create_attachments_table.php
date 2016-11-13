<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('brief_id')->default(0);
            $table->integer('planning_id')->default(0);
            $table->integer('amendment_id')->default(0);
            $table->string('department_ids')->nullable();
            $table->string('filename');
            $table->string('filetype')->nullable();
            $table->string('directory'); // laravel directory location
            $table->string('disk'); // laravel disk location
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('attachments');
    }
}
