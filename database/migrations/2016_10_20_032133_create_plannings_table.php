<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plannings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('client_id');
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_landline')->nullable();
            $table->string('contact_mobile')->nullable();
            $table->string('title');
            $table->tinyInteger('jobstatus_id');
            $table->string('budget')->nullable();
            $table->tinyInteger('formatofresponse_id')->default(0)->nullable();
            $table->datetime('pitch_quote_datetime')->nullable();
            $table->date('pitch_quote_date')->nullable();
            $table->time('pitch_quote_time')->nullable();
            $table->datetime('ideal_qa_datetime')->nullable();
            $table->date('ideal_qa_date')->nullable();
            $table->time('ideal_qa_time')->nullable();
            $table->datetime('ideal_review_datetime')->nullable();
            $table->date('ideal_review_date')->nullable();
            $table->time('ideal_review_time')->nullable();
            $table->datetime('project_deadline_datetime')->nullable();
            $table->date('project_deadline_date')->nullable();
            $table->time('project_deadline_time')->nullable();
            $table->text('job_specifications', 40000)->nullable();
            $table->string('attachment_ids')->nullable();
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
        Schema::dropIfExists('plannings');
    }
}
