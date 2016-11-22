@extends('layouts.pdf')

@section('title')
Brief Submitted File
@endsection

<?php
if ($brief->projectstatus_id == 1) {
  $ps_color = "background-color:#f2dede;color:#a94442";
} else {
  $ps_color = "background-color:#d9edf7;color:#31708f";
}
?>

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
      	  <p class="pull-right text-muted">{{ date('m/d/Y') }}</p>
        </div>
        <div class="col-xs-12 m-t-n">
      	  <h2 class="text-brand1">Brief Sheet</h2>
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
        	<p class="bg-light p-l-sm" style="{{$ps_color}}">{{ $brief->projectstatus->name }}&nbsp;</p>
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
          <label class="control-label text-left text-sm">
            <strong>Quote Required By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($brief->quoted_required_by_at)) ? $brief->quoted_required_by_at->format('M d, Y') : '&nbsp;' }}
          </p>
        </div>
        <div class="col-xs-3">
          <label class="control-label text-left text-sm">
            <strong>Proposal Required By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($brief->proposal_required_by_at)) ? $brief->proposal_required_by_at->format('M d, Y') : '&nbsp;' }}
          </p>
        </div>
        <div class="col-xs-3">
          <label class="control-label text-left text-sm">
            <strong>1st Stage Required By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($brief->firststage_required_by_at)) ? $brief->firststage_required_by_at->format('M d, Y') : '&nbsp;' }}
          </p>
        </div>
        <div class="col-xs-3">
          <label class="control-label text-left text-sm">
            <strong>Project Delivered By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($brief->project_delivered_by_at)) ? $brief->project_delivered_by_at->format('M d, Y') : '&nbsp;' }}
          </p>
        </div>
      </div>
      <!-- / Information -->
    </div>
  </div>
</div>

<div class="">
  <div class="row bg-white" style="height:50px"></div>
</div>

<div class="page-break">
  <div class="row bg-white">

    <div class="col-xs-12">
      <div class="row m-b-md">
        <div class="col-xs-12 m-b-sm">
          <p class="bg-primary p-l-sm" style="{{$ps_color}}"><strong>Amends</strong></p>
        </div>
        @foreach ($brief->amendments->reverse() as $key => $amend)
          <div class="col-xs-12">
            <p class=" m-b-xs">
              <strong>Amend {{ $key+1 }}</strong>
              @if ($amend->is_internal)<span> - Internal Amend</span>@endif
            </p>
            <p class="text-muted m-b-xs">
              Amended by 
              @if (count($amend->user))
              {{ $amend->user->forename }} {{ $amend->user->surname }}
              @else
              &lt;missing info&gt;
              @endif
               - {{ $amend->updated_at->format('l, M d, Y - h:m') }}</p>
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
            <ul class="p-l-md l-s-n">
              <li>
                <i class="{{ $attachment->classNames }} text-md"></i> 
                <a 
                  class="" 
                  href="{{ route('download_attachment', [$attachment->id]) }}">
                  <span class="text-brand1">{{ $attachment->filename }}</span>
                </a>
              </li>
            </ul>
            <h6 class="p-l-md text-muted">
              Uploaded by 
              @if (count($amend->user))
              {{ $attachment->user->forename }} {{ $attachment->user->surname }}
              @else
              &lt;missing info&gt;
              @endif
               - {{ $attachment->updated_at->format('l, M d, Y') }}</h6>
          </div>
          @endforeach

          <div class="col-xs-12">
            <p class="bg-light p-sm p-l-sm p-r-sm">
              {!! nl2br(e($amend->content)) !!}&nbsp;
            </p>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</div>

<div class="">
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

        @if ($brief->summary)
        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm" style="{{$ps_color}}"><strong>#01 Brief Summary</strong></p>
          <p class="bg-light p-l-sm">{!! nl2br(e($brief->summary)) !!}&nbsp;</p>
        </div>
        @endif

        @if ($brief->disciplines_required_ids)
        <div class="col-xs-12">
          <p class="bg-primary p-l-sm" style="{{$ps_color}}"><strong>#02 Disciplines Required</strong></p>
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
        @endif

        @if ($brief->objectives_or_measures)
        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm" style="{{$ps_color}}"><strong>#03 Objectives / Measure</strong></p>
          <p class="bg-light p-l-sm">{!! nl2br(e($brief->objectives_or_measures)) !!}&nbsp;</p>
        </div>
        @endif

        @if ($brief->content)
        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm" style="{{$ps_color}}"><strong>#04 Context</strong></p>
          <p class="bg-light p-l-sm">{!! nl2br(e($brief->content)) !!}&nbsp;</p>
        </div>
        @endif

        @if ($brief->targetaudience_and_insight)
        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm" style="{{$ps_color}}"><strong>#05 Target Audience and Insight</strong></p>
          <p class="bg-light p-l-sm">{!! nl2br(e($brief->targetaudience_and_insight)) !!}&nbsp;</p>
        </div>
        @endif

        @if ($brief->targetaudience_think)
        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm" style="{{$ps_color}}"><strong>#06 What do I want the target audience to Think?</strong></p>
          <p class="bg-light p-l-sm">{!! nl2br(e($brief->targetaudience_think)) !!}&nbsp;</p>
        </div>
        @endif

        @if ($brief->targetaudience_feel)
        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm" style="{{$ps_color}}"><strong>#06 What do I want the target audience to Feel?</strong></p>
          <p class="bg-light p-l-sm">{!! nl2br(e($brief->targetaudience_feel)) !!}&nbsp;</p>
        </div>
        @endif

        @if ($brief->targetaudience_do)
        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm" style="{{$ps_color}}"><strong>#06 What do I want the target audience to Do?</strong></p>
          <p class="bg-light p-l-sm">{!! nl2br(e($brief->targetaudience_do)) !!}&nbsp;</p>
        </div>
        @endif

        @if ($brief->keymessages_or_propositions)
        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm" style="{{$ps_color}}"><strong>#07 Key Messages / Propositions</strong></p>
          <p class="bg-light p-l-sm">{!! nl2br(e($brief->keymessages_or_propositions)) !!}&nbsp;</p>
        </div>
        @endif

        @if ($brief->creative)
        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm" style="{{$ps_color}}"><strong>#08 Creative</strong></p>
          <p class="bg-light p-l-sm">{!! nl2br(e($brief->creative)) !!}&nbsp;</p>
        </div>
        @endif

        @if ($brief->budget_timings_and_outputs)
        <div class="col-xs-12 m-b-lg">
          <p class="bg-primary p-l-sm" style="{{$ps_color}}"><strong>#09 Budgets, Timings and Outputs Required</strong></p>
          <p class="bg-light p-l-sm">{!! nl2br(e($brief->budget_timings_and_outputs)) !!}&nbsp;</p>
        </div>
        @endif

        @if (count($brief->attachmentsNotAmend))
        <div class="col-xs-12 m-b-lg">
          <p class="bg-brand-1 p-l-sm text-white" style="{{$ps_color}}">
            <strong>#10 Attachments</strong></p>
          @foreach ($brief->attachmentsNotAmend as $attachment)
          <div class="col-xs-12">
            <ul class="p-l-md l-s-n">
              <li>
                <i class="{{ $attachment->classNames }} text-md"></i> 
                <a 
                  class="" 
                  href="{{ route('download_attachment', [$attachment->id]) }}">
                  <span class="text-brand1">{{ $attachment->filename }}</span>
                </a>
              </li>
            </ul>
            <h6 class="p-l-md text-muted">
              @if (count($attachment->user))
              Uploaded by {{ $attachment->user->forename }} {{ $attachment->user->surname }}
              @else
              Upload by &lt;missing info&gt;
              @endif
               - {{ $attachment->updated_at->format('h:m:s l, M d, Y') }}
            </h6>
          </div>
          @endforeach
        </div>
        @endif

      </div>
    </div>

  </div>
</div>
@endsection
