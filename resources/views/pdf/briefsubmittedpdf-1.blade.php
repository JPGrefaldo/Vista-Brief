@extends('layouts.pdf')

@section('title')
Brief Submitted File
@endsection


@section('content')
<div class="row bg-white">
  <div class="col-xs-10 col-xs-offset-1 col-lg-8 col-lg-offset-2">

    <!-- Title -->
	<div class="row m-b-md">
	  <div class="col-sm-6 m-b-n m-t-n">
		<h1 class="text-default">VISTA</h1>
	  </div>
	  <div class="col-sm-6 m-t-sm">
		<p class="pull-right text-muted">{{ $brief->updated_at->format('M d, Y') }}</p>
	  </div>
	  <div class="col-sm-12 m-t-n">
		<h2 class="text-primary">Brief Sheet</h2>
	  </div>
	</div>
	<!-- / Title -->

	<!-- Information -->
	<div class="row">
      <div class="col-sm-6">
	    <label class="control-label text-left"><strong>Client</strong></label>
      	<p class="bg-light p-l-sm">{{ $brief->client->name }}</p>
      </div>
      <div class="col-sm-6">
	    <label class="control-label text-left"><strong>Project Status</strong></label>
      	<p class="bg-light p-l-sm">{{ $brief->projectstatus->name }}</p>
      </div>

      <div class="col-sm-6">
	    <label class="control-label text-left"><strong>Job Number</strong></label>
      	<p class="bg-light p-l-sm">{{ $brief->jobnumber }}</p>
      </div>
      <div class="col-sm-6">
	    <label class="control-label text-left"><strong>Old Job Number</strong></label>
      	<p class="bg-light p-l-sm">{{ $brief->old_jobnumber }}</p>
      </div>

      <div class="col-sm-9">
	    <label class="control-label text-left"><strong>Job Name</strong></label>
      	<p class="bg-light p-l-sm">{{ $brief->jobname }}</p>
      </div>
      <div class="col-sm-3">
	    <label class="control-label text-left"><strong>Your Budget</strong></label>
      	<p class="bg-light p-l-sm">{{ $brief->budget }}</p>
      </div>

      <div class="col-sm-9">
	    <label class="control-label text-left"><strong>Key Deliverables</strong></label>
      	<p class="bg-light p-l-sm">{{ $brief->keydeliverables }}</p>
      </div>
      <div class="col-sm-3">
	    <label class="control-label text-left"><strong>Project Manager</strong></label>
      	<p class="bg-light p-l-sm">{{ $brief->projectmanager }}</p>
      </div>


      <div class="col-sm-3">
	    <label class="control-label text-left"><strong>Quote Required By</strong></label>
      	<p class="bg-light p-l-sm">{{ $brief->quoted_required_by_at->format('M d, Y') }}</p>
      </div>
      <div class="col-sm-3">
	    <label class="control-label text-left"><strong>Proposal Required By</strong></label>
      	<p class="bg-light p-l-sm">{{ $brief->proposal_required_by_at->format('M d, Y') }}</p>
      </div>
      <div class="col-sm-3">
	    <label class="control-label text-left"><strong>1st Stage Required By</strong></label>
      	<p class="bg-light p-l-sm">{{ $brief->firststage_required_by_at->format('M d, Y') }}</p>
      </div>
      <div class="col-sm-3">
	    <label class="control-label text-left"><strong>Project Delivered By</strong></label>
      	<p class="bg-light p-l-sm">{{ $brief->project_delivered_by_at->format('M d, Y') }}</p>
      </div>
	</div>
	<!-- / Information -->

  </div>
</div>
@endsection
