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
          <small class="text-muted">Welcome</small>
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
          List of Latest Planning Requests
          <div class="text-right">
            <a href="{{ route('newplanningrequest') }}" class="btn btn-brand1">
              <i class="fa fa-fw fa-plus"></i>
              Create New Planning Request
            </a>
            <a href="" class="btn btn-dark hide">
              Advance Search
              <i class="fa fa-fw fa-search"></i>
            </a>
          </div>
        </div>
        <div class="row wrapper">
          <div class="col-sm-5 m-b-xs">
            <!--<select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Bulk action</option>
              <option value="1">Delete selected</option>
              <option value="2">Bulk edit</option>
              <option value="3">Export</option>
            </select>-->
            <button class="btn btn-sm btn-default hide">Apply</button>                
          </div>
          <div class="col-sm-1 col-md-4"></div>
          <div class="col-sm-6 col-md-3">
            <form method="GET" action="{{ route('quicksearchplanning') }}">
              <div class="input-group">
                <input 
                  type="text" 
                  name="keyword" 
                  class="input-sm form-control" 
                  placeholder="Quick Search" 
                  value="{{ (isset($keyword)) ? $keyword : '' }}">
                <span class="input-group-btn">
                  <button class="btn btn-sm btn-brand1" type="submit">Find!</button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th class="hide" style="width:20px;">
                  <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                  </label>
                </th>
                <th class="bg-bluegreen1">Client</th>
                <th class="bg-bluegreen1">Job Title</th>
                <th class="bg-bluegreen1">Taken By</th>
                <th class="bg-bluegreen1">Format of Response</th>
                <th class="bg-bluegreen1">Date Request Made</th>
                <th class="bg-bluegreen1">Status</th>
                <th class="bg-bluegreen1" style="width:30px;">
                  <i class="fa fa-cog"></i>
                </th>
              </tr>
            </thead>
            <tbody>
              @if ($plannings->isEmpty())
                <tr>
                  <td colspan="7">
                    <p class="text-center m-md">
                      Sorry, no planning requests found. 
                      @if (!isset($keyword)) 
                        Begin by creating a 
                        <a href="{{ route('newplanningrequest') }}" class="text-info">
                          <u>new planning request here</u>
                        </a>.
                      @endif
                    </p>
                  </td>
                </tr>
              @else
                @foreach ($plannings as $planning)
                  <tr>
                    <td class="hide">
                      <label class="i-checks m-b-none">
                        <input type="checkbox" name="post[]">
                        <i></i>
                      </label>
                    </td>
                    <td>
                      @if (count($planning->client))
                        {{ $planning->client->name }}
                      @endif
                    </td>
                    <td><span class="text-ellipsis">{{ $planning->title }}</span></td>
                    <td><span class="text-ellipsis">
                      @if (count($planning->user))
                        {{ $planning->user->forename }} {{ $planning->user->surname }}
                      @endif
                    </span></td>
                    <td>
                      @if (count($planning->formofresponse))
                        {{ (!empty($planning->formofresponse->name)) ? $planning->formofresponse->name : '' }}
                      @endif
                    </td>
                    <td>{{ $planning->created_at->format('M d, Y') }}</td>
                    <td>
                      @if (count($planning->jobstatus))
                        {{ $planning->jobstatus->name }}
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('submittedplanningrequest', [$planning->id]) }}" class="active" title="view">
                        <i class="fa fa-eye text-brand-1 a-hover-ltblue"></i>
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
            <div class="col-sm-5">
              <small class="text-muted inline m-t-sm m-b-sm">
                Showing {{ $plannings->firstItem() }}-{{ $plannings->lastItem() }} of {{ $plannings->total() }} items
              </small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                @if ($plannings->onFirstPage())
                  <li class="disabled"><a><i class="fa fa-chevron-left"></i></a></li>
                @else
                  <li>
                    <a href="{{ $plannings->previousPageUrl() }}"><i class="fa fa-chevron-left"></i></a>
                  </li>                
                @endif

                @foreach ($plannings->getUrlRange(1, $plannings->lastPage()) as $page=>$url)
                  @if ($page == $plannings->currentPage())
                    <li class="disabled"><a>{{ $page }}</a></li>
                  @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                  @endif
                @endforeach

                @if ($plannings->hasMorePages())
                  <li><a href="{{ $plannings->nextPageUrl() }}"><i class="fa fa-chevron-right"></i></a></li>
                @else
                  <li class="disabled"><a><i class="fa fa-chevron-right"></i></a></li>
                @endif
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