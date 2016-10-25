@extends('layouts.pdf')

@section('title')
Planning Request File
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
      	  <p class="pull-right text-muted">{{ $planning->updated_at->format('d/m/Y') }}</p>
        </div>
        <div class="col-xs-12 m-t-n">
      	  <h2 class="text-primary">Planning Request</h2>
        </div>
      </div>
      <!-- / Title -->

      <!-- Information -->
      <div class="row">
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Client</strong></label>
        	<p class="bg-light p-l-sm">{{ $planning->client->name }}&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Taken By</strong></label>
        	<p class="bg-light p-l-sm">{{ $planning->user->forename }} {{ $planning->user->surname }}&nbsp;</p>
        </div>

        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Contact Name/Title</strong></label>
        	<p class="bg-light p-l-sm">{{ $planning->contact_name }}&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Contact Email</strong></label>
        	<p class="bg-light p-l-sm">{{ $planning->contact_email }}&nbsp;</p>
        </div>

        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Contact Landline</strong></label>
        	<p class="bg-light p-l-sm">{{ $planning->contact_landline }}&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Contact Mobile</strong></label>
        	<p class="bg-light p-l-sm">{{ $planning->contact_mobile }}&nbsp;</p>
        </div>
      </div>
      <!-- / Information -->

      <!-- Job Details -->
      <div class="row">
        <div class="col-xs-12">
          <p class="bg-primary p-l-sm"><strong>Job Details</strong></p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Title</strong></label>
          <p class="bg-light p-l-sm">{{ $planning->title }}&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Status</strong></label>
          <p class="bg-light p-l-sm">{{ $planning->jobstatus->name }}&nbsp;</p>
        </div>

        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Budget</strong></label>
          <p class="bg-light p-l-sm">{{ $planning->budget }}&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Format of Response</strong></label>
          <p class="bg-light p-l-sm">{{ $planning->formofresponse->name }}&nbsp;</p>
        </div>
      </div>
      <!-- / Job Details -->

      <!-- / Timings -->
      <div class="row">
        <div class="col-xs-12">
          <p class="bg-primary p-l-sm"><strong>Timings</strong></p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Pitch/Quote Required By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($planning->pitch_quote_date)) ? $planning->pitch_quote_date->format('M d, Y') : '&nbsp;' }}
          </p>
        </div>
        <div class="col-xs-6 hide">
          <label class="control-label text-left"><strong>Time</strong></label>
        	<p class="bg-light p-l-sm">&nbsp;</p>
        </div>
        <div class="col-xs-6">
          <label class="control-label text-left"><strong>Ideal/Q&amp;A Required By</strong></label>
        	<p class="bg-light p-l-sm">
            {{ (!empty($planning->ideal_qa_date)) ? $planning->ideal_qa_date->format('M d, Y') : '&nbsp;' }}
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
      <div class="row">
        <div class="col-xs-12">
          <p class="bg-primary p-l-sm"><strong>Job Spec</strong></p>
        </div>
        <div class="col-xs-12">
          <p class="bg-light p-l-sm">{{ $planning->job_specifications }}&nbsp;</p>
        </div>
      </div>
      <!-- / Job Spec -->

    </div>
  </div>
</div>
@endsection
