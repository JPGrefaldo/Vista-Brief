@extends('layouts.pdf')

@section('title')
Planning Request File
@endsection


@section('content')
<div class="page-break bg-white">
  <div class="row bg-white">
    <div class="col-xs-12 bg-white">
      <!-- Title -->
      <div class="row m-b-md">
        <div class="col-xs-6 m-b-n m-t-n">
          <img src="{{url('/')}}/images/Vista_logo_Vista_gray.png" width="121" height="59">
      	  <h1 class="text-default hide">VISTA TEXT</h1>
        </div>
        <div class="col-xs-6 m-t-sm">
      	  <p class="pull-right text-muted">{{date('d/m/Y')}}</p>
        </div>
        <div class="col-xs-12 m-t-n">
      	  <h2 class="text-brand1">Planning Request</h2>
        </div>
      </div>
      <!-- / Title -->

      <!-- Information -->
      <div class="row">
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Client</strong></label>
        	<p class="bg-light p-l-sm">
            @if (count($planning->client))
              {{$planning->client->name}}
            @else
              &lt;client info missing&gt;
            @endif
            &nbsp;
          </p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Taken By</strong></label>
        	<p class="bg-light p-l-sm p-r-sm">{{$planning->taken_by}}&nbsp;</p>
        </div>

        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Contact Name/Title</strong></label>
        	<p class="bg-light p-l-sm p-r-sm">{{$planning->contact_name}}&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Contact Email</strong></label>
        	<p class="bg-light p-l-sm p-r-sm">{{$planning->contact_email}}&nbsp;</p>
        </div>

        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Contact Landline</strong></label>
        	<p class="bg-light p-l-sm p-r-sm">{{$planning->contact_landline}}&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Contact Mobile</strong></label>
        	<p class="bg-light p-l-sm p-r-sm">{{$planning->contact_mobile}}&nbsp;</p>
        </div>
      </div>
      <!-- / Information -->

      <!-- Job Details -->
      <div class="row">
        <div class="col-xs-12">
          <p class="bg-brand-1 p-l-sm text-white"><strong>Job Details</strong></p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Title</strong></label>
          <p class="bg-light p-l-sm p-r-sm">{{$planning->title}}&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Status</strong></label>
          <p class="bg-light p-l-sm">            
            @if (count($planning->jobstatus))
              {{$planning->jobstatus->name}}
            @else
              &lt;status info missing&gt;
            @endif
            &nbsp;
          </p>
        </div>

        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Budget</strong></label>
          <p class="bg-light p-l-sm p-r-sm">{{$planning->budget}}&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Format of Response</strong></label>
          <p class="bg-light p-l-sm p-r-sm">
            @if (count($planning->formofresponse))
              {{$planning->formofresponse->name}}
            @else
              &lt;format info missing&gt;
            @endif
            &nbsp;
          </p>
        </div>
      </div>
      <!-- / Job Details -->

      <!-- / Timings -->
      <div class="row">
        <div class="col-xs-12">
          <p class="bg-brand-1 p-l-sm text-white"><strong>Timings</strong></p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Pitch/Quote Required By</strong></label>
        	<p class="bg-light p-l-sm">
            {{(!empty($planning->pitch_quote_date)) ? $planning->pitch_quote_date->format('M d, Y') : '&nbsp;'}}
          </p>
        </div>
        <div class="col-xs-6 hide">
          <label class="control-label text-left"><strong>Time</strong></label>
        	<p class="bg-light p-l-sm">&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Ideal/Q&amp;A Required By</strong></label>
        	<p class="bg-light p-l-sm">
            {{(!empty($planning->ideal_qa_date)) ? $planning->ideal_qa_date->format('M d, Y') : '&nbsp;'}}
          </p>
        </div>
        <div class="col-xs-6 hide">
          <label class="control-label text-left"><strong>Time</strong></label>
          <p class="bg-light p-l-sm">&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Ideal Review Required By</strong></label>
          <p class="bg-light p-l-sm">
            {{ (!empty($planning->ideal_review_date)) ? $planning->ideal_review_date->format('M d, Y') : '&nbsp;' }}
          </p>
        </div>
        <div class="col-xs-6 hide">
          <label class="control-label text-left"><strong>Time</strong></label>
          <p class="bg-light p-l-sm">&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Project Delivered By</strong></label>
          <p class="bg-light p-l-sm">
            {{ (!empty($planning->project_deadline_date)) ? $planning->project_deadline_date->format('M d, Y') : '&nbsp;' }}
          </p>
        </div>
        <div class="col-xs-6 hide">
          <label class="control-label text-left"><strong>Time</strong></label>
          <p class="bg-light p-l-sm">&nbsp;</p>
        </div>
      </div>
      <!-- / Timings -->

      <!-- Job Spec -->
      @if ($planning->job_specifications)
      <div class="row">
        <div class="col-xs-12">
          <p class="bg-brand-1 p-l-sm text-white" style="margin-bottom:0px;"><strong>Job Spec</strong></p>
          <p class="bg-light p-l-sm p-r-sm" style="margin-top:0px;">{!! nl2br(e($planning->job_specifications)) !!}&nbsp;</p>
        </div>
      </div>
      @endif
      <!-- / Job Spec -->

      <!-- Attachments -->      
      @if (count($planning->attachments))
      <div class="row">
        <div class="col-xs-12">
          <p class="bg-brand-1 p-l-sm text-white"><strong>Attachments</strong></p>
        </div>
        @foreach ($planning->attachments as $attachment)
        <div class="col-xs-12">
          <ul class="p-l-n l-s-n">
            <li>
              <i class="{{ $attachment->classNames }} text-md"></i> 
              <a 
                class="" 
                href="{{ route('download_attachment', [$attachment->id]) }}">
                <span class="text-brand1">{{ $attachment->filename }}</span>
              </a>
            </li>
          </ul>
          <h6 class="p-l-n text-muted">
            @if (count($attachment->user))
              Uploaded by {{ $attachment->user->forename }} {{ $attachment->user->surname }}
            @else
              Upload by &lt;missing info&gt;
            @endif
             - {{ $attachment->updated_at->format('H:i:s l, M d, Y') }}
          </h6>
        </div>
        @endforeach
      </div>      
      @endif
      <!-- / Attachments -->
    </div>
  </div>
</div>
@endsection
