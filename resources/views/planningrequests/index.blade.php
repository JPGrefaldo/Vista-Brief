@extends('layouts.dashboard')

@section('title')
Planning Requests - Vista
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
        <div class="col-sm-12 col-xs-12 col-lg-12">
          <h1 class="m-n font-thin h3 text-black">Planning Requests</h1>
          <small class="text-muted">welcome</small>
          @if (session('new_planning_success'))
            <span class="pull-right alert-success p-r-sm p-l-sm">{{ session('new_planning_success') }}</span>
          @endif
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md">
      <div class="panel panel-default">
        <div class="panel-heading">
          List of Active Planning Request
          <div class="text-right">
            <a href="{{ route('newplanningrequest') }}" class="btn btn-success">
              <i class="fa fa-fw fa-plus"></i>
              Create New Planning Request
            </a>
            <a href="" class="btn btn-dark">
              Search
              <i class="fa fa-fw fa-search"></i>
            </a>
          </div>
        </div>
        <div class="row wrapper">
          <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Bulk action</option>
              <option value="1">Delete selected</option>
              <option value="2">Bulk edit</option>
              <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>                
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th style="width:20px;">
                  <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                  </label>
                </th>
                <th>Client</th>
                <th>Job Title</th>
                <th>Taken By</th>
                <th>Format of Response</th>
                <th>Date of Request Made</th>
                <th>Status</th>
                <th style="width:30px;">
                  <i class="fa fa-cog"></i>
                </th>
              </tr>
            </thead>
            <tbody>
              @if ($plannings->isEmpty())
                <tr>
                  <td colspan="8">
                    <p class="text-center m-md">Sorry, no planning requests found. Begin by creating a <a href="{{ route('newplanningrequest') }}" class="text-info"><u>new planning request here</u></a>.</p>
                  </td>
                </tr>
              @else
                @foreach ($plannings as $planning)
                  <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $planning->client->name }}</td>
                    <td><span class="text-ellipsis">{{ $planning->title }}</span></td>
                    <td><span class="text-ellipsis">{{ $planning->user->forename }} {{ $planning->user->surname }}</span></td>
                    <td>{{ (!empty($planning->formofresponse->name)) ? $planning->formofresponse->name : '' }}</td>
                    <td>{{ $planning->created_at->format('M d, Y') }}</td>
                    <td>{{ $planning->jobstatus->name }}</td>
                    <td>
                      <a href="{{ route('submittedplanningrequest', [$planning->id]) }}" class="active" title="view">
                        <i class="fa fa-eye text-primary"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-4 hidden-xs">
              <select class="input-sm form-control w-sm inline v-middle">
                <option value="0">Bulk action</option>
                <option value="1">Delete selected</option>
                <option value="2">Bulk edit</option>
                <option value="3">Export</option>
              </select>
              <button class="btn btn-sm btn-default">Apply</button>                  
            </div>
            <div class="col-sm-4 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
            </div>
            <div class="col-sm-4 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href><i class="fa fa-chevron-left"></i></a></li>
                <li><a href>1</a></li>
                <li><a href>2</a></li>
                <li><a href>3</a></li>
                <li><a href>4</a></li>
                <li><a href>5</a></li>
                <li><a href><i class="fa fa-chevron-right"></i></a></li>
              </ul>
            </div>
          </div>
        </footer>
      </div>
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