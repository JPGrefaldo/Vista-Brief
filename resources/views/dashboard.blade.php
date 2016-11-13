@extends('layouts.dashboard')

@section('title')
Dashboard - Vista
@endsection

@section('content')
<div class="app app-header-fixed ">
  

  <!-- header -->
  @include('includes.dashboard-header')
  <!-- / header -->


  <!-- aside -->
  @include('includes.mainmenu-left')
  <!-- / aside -->


  <!-- content -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
	    

<div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="
    app.settings.asideFolded = false; 
    app.settings.asideDock = false;
  ">
  <!-- main -->
  <div class="col">
    <!-- main header -->
    <div class="bg-light lter b-b wrapper-md">
      <div class="row">
        <div class="col-sm-6 col-xs-12">
          <h1 class="m-n font-thin h3 text-black">Dashboard</h1>
          <small class="text-muted">Welcome to Vista Brief System</small>
        </div>
      </div>
    </div>
    <!-- / main header -->

    <div class="wrapper-md">
      <!-- Main Actions -->
      <div class="row">
  	    <div class="col-lg-6 col-md-6 col-sm-6">
  	      <div class="panel b-a">
  	        <div class="panel-heading text-center bg-brand-1 no-border">
  	          <h4 class="text-u-c m-b-none hide">Planning Requests</h4>
  	          <h2 class="m-t-none">
  	            <sup class="pos-rlt hide" style="top:-22px">$</sup>
  	            <span class="h3 m-t-xs mb-x-s text-white">Planning Requests</span>
  	            <span class="text-xs hide">/ mo</span>
  	          </h2>
  	        </div>
  	        <ul class="list-group">
  	          <li class="list-group-item text-center">
  	            <i class="icon-check text-success m-r-xs hide"></i> Notify Planning of a new equity and to request a Project Manager
  	          </li>
  	        </ul>
  	        <div class="panel-footer text-center">
  	          <a href="{{ route('newplanningrequest') }}" class="btn btn-brand1 block font-bold m">Create New Planning Request</a>
  	        </div>
  	      </div>
  	    </div>
  	    <div class="col-lg-6 col-md-6 col-sm-6">
  	      <div class="panel b-a">
  	        <div class="panel-heading text-center bg-brand-1 no-border">
  	          <h4 class="text-u-c m-b-none hide">Brief Sheets</h4>
  	          <h2 class="m-t-none">
  	            <sup class="pos-rlt hide" style="top:-22px">$</sup>
  	            <span class="h3 m-t-xs mb-x-s text-white">Brief Sheets</span>
  	            <span class="text-xs hide">/ mo</span>
  	          </h2>
  	        </div>
  	        <ul class="list-group">
  	          <li class="list-group-item text-center">
  	            <i class="icon-check text-success m-r-xs hide"></i> Use this to brief Studio, Exhibitions, Venue and Events/strategy teams on new Projects
  	          </li>
  	        </ul>
  	        <div class="panel-footer text-center">
  	          <a href="{{ route('newbriefsheet') }}" class="btn btn-brand1 block font-bold m">Create New Brief Sheets</a>
  	        </div>
  	      </div>
  	    </div>
      </div>
      <!-- / Main Actions -->
    </div>
  </div>
  <!-- / main -->
</div>



	  </div>
  </div>
  <!-- /content -->
  
  <!-- footer -->
  @include('includes.dashboard-footer')
  <!-- / footer -->



</div>
@endsection