<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBriefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('client_id');
            $table->string('jobnumber', 8)->nullable();
            $table->string('old_jobnumber', 8)->nullable();
            $table->string('jobname', 85);
            $table->tinyInteger('projectstatus_id');
            $table->boolean('is_draft')->default(0);
            $table->string('projectmanager', 200)->nullable();
            $table->string('budget', 60)->nullable();
            $table->string('keydeliverables', 85)->nullable();
            $table->date('quoted_required_by_at')->nullable();
            $table->date('proposal_required_by_at')->nullable();
            $table->date('firststage_required_by_at')->nullable();
            $table->date('project_delivered_by_at')->nullable();
            $table->string('summary', 210)->nullable();
            $table->string('disciplines_required_ids', 500)->nullable();
            $table->text('objectives_or_measures', 40000)->nullable();
            $table->text('content', 40000)->nullable(); // suppose to be context
            $table->text('targetaudience_and_insight', 40000)->nullable();
            $table->text('targetaudience_think', 40000)->nullable();
            $table->text('targetaudience_feel', 40000)->nullable();
            $table->text('targetaudience_do', 40000)->nullable();
            $table->text('keymessages_or_propositions', 40000)->nullable();
            $table->text('creative', 40000)->nullable();
            $table->text('budget_timings_and_outputs', 40000)->nullable();
            $table->string('attachment_ids', 500)->nullable();
            $table->string('amendment_ids', 500)->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('client_id')->references('id')->on('clients');
            // $table->foreign('projectstatus_id')->references('id')->on('project_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('briefs');
    }
}
