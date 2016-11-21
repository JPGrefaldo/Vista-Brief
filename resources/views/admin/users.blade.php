@extends('layouts.dashboard')

@section('title')
Manage Users - Vista
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
          <h1 class="m-n font-thin h3 text-black">Manage Users</h1>
          <small class="text-muted">welcome</small>
          @if (session('user_edit_success'))
            <span class="pull-right alert-success p-r-sm p-l-sm">{{ session('user_edit_success') }}</span>
          @endif
          @if (session('user_delete_success'))
            <span class="pull-right alert-success p-r-sm p-l-sm">{{ session('user_delete_success') }}</span>
          @endif
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md">
      <div class="panel panel-default">
        <div class="panel-heading">
          List of Users
          <div class="text-right">
            <a href="{{ route('formnewuser') }}" class="btn btn-brand1">
              <i class="fa fa-fw fa-plus"></i>
              Add New User
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
          <div class="col-sm-1 col-md-4">
          </div>
          <div class="col-sm-6 col-md-3">
            <form method="GET" action="{{ route('quicksearchuser') }}">
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
                <th>Username</th>
                <th>First Name</th>
                <th>Surname</th>
                <th>Email Address</th>
                <th style="width:110px;"><i class="fa fa-cog"></i></th>
              </tr>
            </thead>
            <tbody>
              @if ($users->isEmpty())
                <tr>
                  <td colspan="5">
                    <p class="text-center m-md">
                      Sorry, no user found. 
                      @if (!isset($keyword)) 
                        Begin by creating a 
                       <a href="{{ route('formnewuser') }}" class="text-info"><u>new user here</u></a>.
                      @endif
                    </p>
                  </td>
                </tr>
              @else
                @foreach ($users as $user)
                  <tr>
                    <td class="hide">
                      <label class="i-checks m-b-none">
                        <input type="checkbox" name="post[]">
                        <i></i>
                      </label>
                    </td>
                    <td>{{ $user->username }}</td>
                    <td><span class="text-ellipsis">{{ $user->forename }}</span></td>
                    <td><span class="text-ellipsis">{{ $user->surname }}</span></td>
                    <td>{{ $user->email }}</td>
                    <td>
                      <a href="{{ route('formeditprofile', [$user->id]) }}">
                        <i class="glyphicon glyphicon-edit text-info"></i>
                      </a> 
                      <a href="{{ route('confirmdeleteuser', [$user->id]) }}">
                        <i class="glyphicon glyphicon-remove-sign text-danger"></i>
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
                showing {{ $users->firstItem() }}-{{ $users->lastItem() }} of {{ $users->total() }} items
              </small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                @if ($users->onFirstPage())
                  <li class="disabled"><a><i class="fa fa-chevron-left"></i></a></li>
                @else
                  <li>
                    <a href="{{ $users->previousPageUrl() }}"><i class="fa fa-chevron-left"></i></a>
                  </li>                
                @endif

                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page=>$url)
                  @if ($page == $users->currentPage())
                    <li class="disabled"><a>{{ $page }}</a></li>
                  @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                  @endif
                @endforeach

                @if ($users->hasMorePages())
                  <li><a href="{{ $users->nextPageUrl() }}"><i class="fa fa-chevron-right"></i></a></li>
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