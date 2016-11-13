@extends('layouts.pdf')

@section('title')
Brief Submitted File
@endsection


@section('content')
<div class="page-break">
  <div class="row bg-white">
    <div class="col-xs-12">
      <!-- Title -->
      <div class="row m-b-md">
        <div class="col-xs-6 m-b-n m-t-n">
      	  <h1 class="text-default">VISTA</h1>
        </div>
        <div class="col-xs-6 m-t-sm">
      	  <p class="pull-right text-muted">{{ date('d/m/Y') }}</p>
        </div>
        <div class="col-xs-12 m-t-n">
      	  <h2 class="text-primary">Brief Sheet</h2>
        </div>
      </div>
      <!-- / Title -->

      <!-- Information -->
      <div class="row">
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Client</strong></label>
        	<p class="bg-light p-l-sm">{{ $brief->client->name }}</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Project Status</strong></label>
        	<p class="bg-light p-l-sm">{{ $brief->projectstatus->name }}</p>
        </div>

        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Job Number</strong></label>
        	<p class="bg-light p-l-sm">{{ $brief->jobnumber }}</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Old Job Number</strong></label>
        	<p class="bg-light p-l-sm">{{ $brief->old_jobnumber }}&nbsp;</p>
        </div>

        <div class="col-xs-9">
          <label class="control-label text-left"><strong>Job Name</strong></label>
        	<p class="bg-light p-l-sm">{{ $brief->jobname }}</p>
        </div>
        <div class="col-xs-3">
          <label class="control-label text-left"><strong>Your Budget</strong></label>
        	<p class="bg-light p-l-sm">{{ $brief->budget }}&nbsp;</p>
        </div>

        <div class="col-xs-9">
          <label class="control-label text-left"><strong>Key Deliverables</strong></label>
        	<p class="bg-light p-l-sm">{{ $brief->keydeliverables }}&nbsp;</p>
        </div>
        <div class="col-xs-3">
            <label class="control-label text-left"><strong>Project Manager</strong></label>
        	<p class="bg-light p-l-sm">{{ $brief->projectmanager }}&nbsp;</p>
        </div>


        <div class="col-xs-3">
          <label class="control-label text-left"><strong>Quote Required By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($brief->quoted_required_by_at)) ? $brief->quoted_required_by_at->format('M d, Y') : '' }}&nbsp;
          </p>
        </div>
        <div class="col-xs-3">
          <label class="control-label text-left"><strong>Proposal Required By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($brief->proposal_required_by_at)) ? $brief->proposal_required_by_at->format('M d, Y') : '' }}&nbsp;
          </p>
        </div>
        <div class="col-xs-3">
          <label class="control-label text-left"><strong>1st Stage Required By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($brief->firststage_required_by_at)) ? $brief->firststage_required_by_at->format('M d, Y') : '' }}&nbsp;
          </p>
        </div>
        <div class="col-xs-3">
          <label class="control-label text-left"><strong>Project Delivered By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($brief->project_delivered_by_at)) ? $brief->project_delivered_by_at->format('M d, Y') : '' }}&nbsp;
          </p>
        </div>
      </div>
      <!-- / Information -->
    </div>
  </div>
</div>

<div class="page-break" style="page-break-after:always;page-break-inside:avoid;overflow:hidden;">
  <div class="row bg-white">

    <div class="col-xs-12">
      <div class="row m-b-md">
        <div class="col-xs-6">
          <h3>Original Brief</h3>
        </div> 
      </div>
    </div>

    <div class="col-xs-12">
      <div class="row m-b-md">
        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#01 Brief Summary</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->summary }}&nbsp;</p>
        </div>

        <div class="col-xs-12">
          <p class="bg-primary p-l-sm"><strong>#02 Disciplines Required</strong></p>
        </div>
        <div class="col-xs-12 m-b-lg">
          <div class="row">
            @foreach ($departments as $department)
            <div class="col-xs-3">
              <p><strong>{{ $department->name }}</strong></p>
              <p class="bg-light p-l-sm">
                {{ (in_array($department->id, explode(',',$brief->disciplines_required_ids))) ? 'Yes':'&nbsp;' }}
              </p>
            </div>
            @endforeach
          </div>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#03 Objectives / Measure</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->objectives_or_measures }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg"><p class="bg-primary p-l-sm"><strong>#04 Creative</strong></p><p class="bg-light p-l-sm">{{ $brief->creative }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
