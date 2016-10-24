@extends('layouts.dashboard')

@section('title')
Brief Sheets - Vista
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
        <div class="col-sm-12 col-xs-12">
          <h1 class="m-n font-thin h3 text-black">Brief Sheets</h1>
          <small class="text-muted">welcome</small>
          @if (session('new_brief_success'))
            <span class="pull-right alert-success p-r-sm p-l-sm">{{ session('new_brief_success') }}</span>
          @endif
          @if (session('update_brief_success'))
            <span class="pull-right alert-success p-r-sm p-l-sm">{{ session('update_brief_success') }}</span>
          @endif
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md">
      <div class="panel panel-default">
        <div class="panel-heading">
          List of Active Brief Sheets
          <div class="text-right">
            <a href="{{ route('newbriefsheet') }}" class="btn btn-success">
              <i class="fa fa-fw fa-plus"></i>
              Create New Brief
            </a>
            <a href="" class="btn btn-dark">
              Advance Search
              <i class="fa fa-fw fa-search"></i>
            </a>
          </div>
        </div>
        <div class="row wrapper">
          <div class="col-sm-5 m-b-xs">
            <!--<select class="input-sm form-control w-sm inline v-middle hide">
              <option value="0">Bulk action</option>
              <option value="1">Delete selected</option>
              <option value="2">Bulk edit</option>
              <option value="3">Export</option>
            </select>-->
            <button class="btn btn-sm btn-default hide">Apply</button>                
          </div>
          <div class="col-sm-1 col-md-4">
          </div>
          <div class="col-sm-6 col-md-3">
            <form method="GET" action="{{ route('quicksearchbrief') }}">
              <div class="input-group">
                <input 
                  type="text" 
                  name="keyword" 
                  class="input-sm form-control" 
                  placeholder="Quick Search" 
                  value="{{ (isset($keyword)) ? $keyword : '' }}">
                <span class="input-group-btn">
                  <button class="btn btn-sm btn-default" type="submit">Find!</button>
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
                <th>Job Number</th>
                <th>Job Name</th>
                <th>Key Deliverables</th>
                <th>Last Update by</th>
                <th>Status</th>
                <th style="width:30px;">
                  <i class="fa fa-cog"></i>
                </th>
              </tr>
            </thead>
            <tbody>
              @if ($briefs->isEmpty())
                <tr>
                  <td colspan="6">
                    <p class="text-center m-md">
                      Sorry, no brief sheets found. 
                      @if (!isset($keyword)) 
                        Begin by creating a 
                       <a href="{{ route('newbriefsheet') }}" class="text-info"><u>new brief sheet here</u></a>.
                      @endif
                    </p>
                  </td>
                </tr>
              @else
                @foreach ($briefs as $brief)
                  <tr>
                    <td class="hide">
                      <label class="i-checks m-b-none">
                        <input type="checkbox" name="post[]">
                        <i></i>
                      </label>
                    </td>
                    <td>{{ $brief->jobnumber }}</td>
                    <td><span class="text-ellipsis">{{ $brief->jobname }}</span></td>
                    <td><span class="text-ellipsis">{{ $brief->keydeliverables }}</span></td>
                    <td>{{ $brief->user->forename }}</td>
                    <td>{{ ($brief->is_draft == 0) ? 'Submitted' : 'Draft' }}</td>
                    <td>
                      @if ($brief->is_draft == 1)
                        <a href="{{ route('formeditbrief', [$brief->id]) }}" class="active" title="edit">
                          <i class="fa fa-edit text-primary"></i>
                        </a>
                      @else
                        <a href="{{ route('submittedbriefsheet', [$brief->id]) }}" class="active" title="edit">
                          <i class="fa fa-eye text-primary"></i>
                        </a>
                      @endif
                    </td> 
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <footer class="panel-footer">
          <div class="row">
            <div class="col-sm-4 hidden-xs hide">
              <select class="input-sm form-control w-sm inline v-middle">
                <option value="0">Bulk action</option>
                <option value="1">Delete selected</option>
                <option value="2">Bulk edit</option>
                <option value="3">Export</option>
              </select>
              <button class="btn btn-sm btn-default">Apply</button>                  
            </div>
            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">
                showing {{ $briefs->firstItem() }}-{{ $briefs->lastItem() }} of {{ $briefs->total() }} items
              </small>
            </div>            
            <div class="col-sm-7 text-right text-center-xs">
              <ul class="pagination pagination-sm m-t-none m-b-none">
                @if ($briefs->onFirstPage())
                  <li class="disabled"><a><i class="fa fa-chevron-left"></i></a></li>
                @else
                  <li>
                    <a href="{{ $briefs->previousPageUrl() }}"><i class="fa fa-chevron-left"></i></a>
                  </li>                
                @endif

                @foreach ($briefs->getUrlRange(1, $briefs->lastPage()) as $page=>$url)
                  @if ($page == $briefs->currentPage())
                    <li class="disabled"><a>{{ $page }}</a></li>
                  @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                  @endif
                @endforeach

                @if ($briefs->hasMorePages())
                  <li><a href="{{ $briefs->nextPageUrl() }}"><i class="fa fa-chevron-right"></i></a></li>
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