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
            $table->string('jobnumber');
            $table->string('old_jobnumber');
            $table->string('jobname');
            $table->tinyInteger('projectstatus_id');
            $table->boolean('is_draft');
            $table->string('projectmanager');
            $table->string('budget');
            $table->string('keydeliverables');
            $table->date('quoted_required_by_at');
            $table->date('proposal_required_by_at');
            $table->date('firststage_required_by_at');
            $table->date('project_delivered_by_at');
            $table->string('disciplines_required_ids');
            $table->string('objectives_or_measures');
            $table->string('content');
            $table->string('targetaudience_and_insight');
            $table->string('targetaudience_think');
            $table->string('targetaudience_feel');
            $table->string('targetaudience_do');
            $table->string('keymessages_or_propositions');
            $table->string('creative');
            $table->string('budget_timings_and_outputs');
            $table->string('attachment_ids');
            $table->string('amendment_ids');
            $table->boolean('is_active');
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
