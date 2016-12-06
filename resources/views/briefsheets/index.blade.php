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
          <small class="text-muted">Welcome</small>
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
          List of Latest Brief Sheets
          <div class="text-right">
            <a href="{{ route('newbriefsheet') }}" class="btn btn-brand1">
              <i class="fa fa-fw fa-plus"></i>
              Create New Brief
            </a>
            <a class="btn btn-brand1" id="open-advancesearch-modal">
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
                <th>Client</th>
                <th>Job Name</th>
                <th>Key Deliverables</th>
                <th>Last Update by</th>
                <th>Last Updated</th>
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
                        <a href="{{ route('newbriefsheet') }}" class="text-info">
                          <u>new brief sheet here</u>
                        </a>.
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
                    <td>
                      @if (count($brief->client))
                        {{ $brief->client->name }}
                      @endif
                    </td>
                    <td><span class="text-ellipsis">{{ $brief->jobname }}</span></td>
                    <td><span class="text-ellipsis">{{ $brief->keydeliverables }}</span></td>
                    <td>
                      @if (count($brief->user))
                        {{ $brief->user->forename }} {{ $brief->user->surname }}
                      @endif
                    </td>
                    <td>{{$brief->updated_at->format('m/d/Y')}}</td>
                    <td>
                      @if ($brief->is_draft == 1)
                        Draft
                      @else
                        @if (count($brief->amendments) > 0)
                          Amended
                        @else
                          Submitted
                        @endif
                      @endif
                    </td>
                    <td>
                      @if ($brief->is_draft == 1)
                        <a href="{{ route('formeditbrief', [$brief->id]) }}" class="active" title="edit">
                          <i class="fa fa-pencil text-brand-1 a-hover-ltblue"></i>
                        </a>
                      @else
                        <a href="{{ route('submittedbriefsheet', [$brief->id]) }}" class="active" title="edit">
                          <i class="fa fa-eye text-brand-1 a-hover-ltblue"></i>
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
                Showing {{ $briefs->firstItem() }}-{{ $briefs->lastItem() }} of {{ $briefs->total() }} items
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

    <!-- Modal: Advance Search -->
    <div id="modal-advance-search" class="modal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Search Brief Sheets</h4>
          </div>
          <form role="form" method="GET" action="{{ route('advancesearchbrief') }}">
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Job Number</label>
                  <input 
                    type="text" 
                    name="jobnumber" 
                    class="form-control" 
                    placeholder="Job Number" 
                    value="{{old('jobnumber')}}">
                </div>
              </div>              
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Job Name</label>
                  <input 
                    type="text" 
                    name="jobname" 
                    class="form-control" 
                    placeholder="Job Name" 
                    value="{{old('jobname')}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Client</label>
                  <select name="client" class="form-control">
                    <option value="">Select</option>
                    @foreach($clients as $client)
                      <option 
                        value="{{ $client->id }}" {{ (old('client') == $client->id) ? "selected":"" }}>
                          {{ $client->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>              
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Project Status</label>
                  <select name="projectstatus" class="form-control">
                    <option value="">Select</option>
                    @foreach($projectstatus as $pstatus)
                      <option 
                        value="{{ $pstatus->id }}" 
                        {{ (old('projectstatus') == $pstatus->id) ? "selected":"" }}>
                          {{ $pstatus->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Budget</label>
                  <input 
                    type="text" 
                    name="budget" 
                    class="form-control" 
                    placeholder="Budget" 
                    value="{{old('budget')}}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Project Manager</label>
                  <input 
                    type="text" 
                    name="projectmanager" 
                    class="form-control" 
                    placeholder="Project Manager" 
                    value="{{old('projectmanager')}}">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="row">
                  @foreach ($departments as $department)
                    <div class="col-xs-6 col-sm-3">
                      <div class="checkbox">
                        <label class="i-checks">
                          <input 
                            type="checkbox" 
                            name="departments[{{ $department->id }}]" 
                            value="{{ $department->id }}" 
                            @if(array_key_exists($department->id, old('departments',[]))) checked @endif><i></i> {{ $department->name }}
                        </label>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="row">
              <div class="col-sm-3">
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
              </div>
              <div class="col-sm-9">
                <button type="submit" class="btn btn-brand1 btn-block">Search</button>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- / Modal -->

  </div>
  <!-- / main -->
</div>


    </div>
  </div>
  <!-- /content -->
  
  <!-- footer -->
  @include('includes.dashboard-footer')
  <!-- / footer -->

  <script src="{{ URL::asset('js/brief/action-brief-advancesearch.js') }}"></script>

</div>
@endsection