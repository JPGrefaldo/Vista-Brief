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
        	<p class="bg-light p-l-sm">{{ $brief->client->name }}&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Project Status</strong></label>
        	<p class="bg-light p-l-sm">{{ $brief->projectstatus->name }}&nbsp;</p>
        </div>

        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Job Number</strong></label>
        	<p class="bg-light p-l-sm">{{ $brief->jobnumber }}&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Old Job Number</strong></label>
        	<p class="bg-light p-l-sm">{{ $brief->old_jobnumber }}&nbsp;</p>
        </div>

        <div class="col-xs-9">
          <label class="control-label text-left"><strong>Job Name</strong></label>
        	<p class="bg-light p-l-sm">{{ $brief->jobname }}&nbsp;</p>
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
            {{ (!empty($brief->quoted_required_by_at)) ? $brief->quoted_required_by_at->format('M d, Y') : '&nbsp;' }}
          </p>
        </div>
        <div class="col-xs-3">
          <label class="control-label text-left"><strong>Proposal Required By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($brief->proposal_required_by_at)) ? $brief->proposal_required_by_at->format('M d, Y') : '&nbsp;' }}
          </p>
        </div>
        <div class="col-xs-3">
          <label class="control-label text-left"><strong>1st Stage Required By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($brief->firststage_required_by_at)) ? $brief->firststage_required_by_at->format('M d, Y') : '&nbsp;' }}
          </p>
        </div>
        <div class="col-xs-3">
          <label class="control-label text-left"><strong>Project Delivered By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($brief->project_delivered_by_at)) ? $brief->project_delivered_by_at->format('M d, Y') : '&nbsp;' }}
          </p>
        </div>
      </div>
      <!-- / Information -->
    </div>
  </div>
</div>

<div class="page-break">
  <div class="row bg-white" style="height:50px"></div>
</div>

<div class="page-break">
  <div class="row bg-white">

    <div class="col-xs-12">
      <div class="row m-b-md">
        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>Amends</strong></p>
        </div>

        @foreach ($brief->amendments_desc as $key => $amend)
          <div class="col-xs-12">
            <p class=" m-b-xs"><strong>Amend {{ $key+1 }}</strong></p>
            <p class="text-muted m-b-xs">
              Amended by {{ $amend->user->forename }} {{ $amend->user->surname }} - 
              {{ $amend->updated_at->format('l, M d, Y - h:m') }}</p>
            <p class="text-muted">
              Amend for 
              @foreach ($departments as $department)
                @if (in_array($department->id, explode(',',$amend->department_ids)))
                  {{ $department->name }},
                @endif
              @endforeach
            </p>
          </div>

          @foreach ($amend->attachments as $attachment)
          <div class="col-xs-12">
            <p class="p-l-md text-info">
              <a href="{{ route('download_attachment', [$attachment->id]) }}">
                {{ $attachment->filename }}
              </a>
            </p>
            <h6 class="p-l-md text-muted">
              Uploaded by {{ $attachment->user->forename }} {{ $attachment->user->surname }} - 
              {{ $attachment->updated_at->format('l, M d, Y') }}</h6>
          </div>
          @endforeach

          <div class="col-xs-12">
            <p class="bg-light">
              {{ $amend->content }}&nbsp;
            </p>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</div>

<div class="page-break">
  <div class="row bg-white" style="height:50px"></div>
</div>

<div class="page-break">
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
              <p><strong>{{ $department->name }}&nbsp;</strong></p>
              <p class="bg-light p-l-sm">
                {{ (in_array($department->id, explode(',',$brief->disciplines_required_ids))) ? 'Yes':'&nbsp;' }}
              </p>
            </div>
            @endforeach
          </div>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#03 Objectives / Measure</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->objectives_or_measures }}&nbsp;</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#04 Creative</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->creative }}&nbsp;</p>
        </div>

        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm"><strong>#05 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{{ $brief->budget_timings_and_outputs }}&nbsp;</p>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
