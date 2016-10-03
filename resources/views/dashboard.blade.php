@extends('layouts.dashboard')

@section('title')
Dashboard
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
          <small class="text-muted">welcome</small>
        </div>
        <div class="col-sm-6 text-right hidden-xs hide">
          <div class="inline m-r text-left">
            <div class="m-b-xs">1290 <span class="text-muted">items</span></div>
            <div ng-init="d3_1=[ 106,108,110,105,110,109,105,104,107,109,105,100,105,102,101,99,98 ]" 
              ui-jq="sparkline" 
              ui-options="[ 106,108,110,105,110,109,105,104,107,109,105,100,105,102,101,99,98 ], {type:'bar', height:20, barWidth:5, barSpacing:1, barColor:'#dce5ec'}" 
              class="sparkline inline">loading...
            </div>
          </div>
          <div class="inline text-left">
            <div class="m-b-xs">$30,000 <span class="text-muted">revenue</span></div>
            <div ng-init="d3_2=[ 105,102,106,107,105,104,101,99,98,109,105,100,108,110,105,110,109 ]" 
              ui-jq="sparkline" 
              ui-options="[ 105,102,106,107,105,104,101,99,98,109,105,100,108,110,105,110,109 ], {type:'bar', height:20, barWidth:5, barSpacing:1, barColor:'#dce5ec'}" 
              class="sparkline inline">loading...
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
      <!-- Main Actions -->
      <div class="row">
  	    <div class="col-lg-6 col-md-6 col-sm-6">
  	      <div class="panel b-a">
  	        <div class="panel-heading text-center bg-info no-border">
  	          <h4 class="text-u-c m-b-none hide">Planning Requests</h4>
  	          <h2 class="m-t-none">
  	            <sup class="pos-rlt hide" style="top:-22px">$</sup>
  	            <span class="h3 m-t-xs mb-x-s text-lt">Planning Requests</span>
  	            <span class="text-xs hide">/ mo</span>
  	          </h2>
  	        </div>
  	        <ul class="list-group">
  	          <li class="list-group-item">
  	            <i class="icon-check text-success m-r-xs"></i> New Items (10)
  	          </li>
  	          <li class="list-group-item">
  	            <i class="icon-check text-success m-r-xs"></i> View All (46)
  	          </li>
  	        </ul>
  	        <div class="panel-footer text-center">
  	          <a href class="btn btn-info block font-bold m">Create new Planning Request</a>
  	        </div>
  	      </div>
  	    </div>
  	    <div class="col-lg-6 col-md-6 col-sm-6">
  	      <div class="panel b-a">
  	        <div class="panel-heading text-center bg-info no-border">
  	          <h4 class="text-u-c m-b-none hide">Brief Sheets</h4>
  	          <h2 class="m-t-none">
  	            <sup class="pos-rlt hide" style="top:-22px">$</sup>
  	            <span class="h3 m-t-xs mb-x-s text-lt">Brief Sheets</span>
  	            <span class="text-xs hide">/ mo</span>
  	          </h2>
  	        </div>
  	        <ul class="list-group">
  	          <li class="list-group-item">
  	            <i class="icon-check text-success m-r-xs"></i> New Items (10)
  	          </li>
  	          <li class="list-group-item">
  	            <i class="icon-check text-success m-r-xs"></i> View All (46)
  	          </li>
  	        </ul>
  	        <div class="panel-footer text-center">
  	          <a href class="btn btn-info block font-bold m">Create new Brief</a>
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