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
            $table->string('jobnumber')->nullable();
            $table->string('old_jobnumber')->nullable();
            $table->string('jobname');
            $table->tinyInteger('projectstatus_id');
            $table->boolean('is_draft');
            $table->string('projectmanager')->nullable();
            $table->string('budget')->nullable();
            $table->string('keydeliverables')->nullable();
            $table->date('quoted_required_by_at')->nullable();
            $table->date('proposal_required_by_at')->nullable();
            $table->date('firststage_required_by_at')->nullable();
            $table->date('project_delivered_by_at')->nullable();
            $table->string('disciplines_required_ids')->nullable();
            $table->string('objectives_or_measures')->nullable();
            $table->string('content')->nullable(); // suppose to be context
            $table->string('targetaudience_and_insight')->nullable();
            $table->string('targetaudience_think')->nullable();
            $table->string('targetaudience_feel')->nullable();
            $table->string('targetaudience_do')->nullable();
            $table->string('keymessages_or_propositions')->nullable();
            $table->string('creative')->nullable();
            $table->string('budget_timings_and_outputs')->nullable();
            $table->string('attachment_ids')->nullable();
            $table->string('amendment_ids')->nullable();
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
