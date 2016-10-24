@extends('layouts.dashboard')

@section('title')
Clients - Vista
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
          <h1 class="m-n font-thin h3 text-black">Clients</h1>
          <small class="text-muted">welcome</small>
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          List of Clients
          <div class="text-right hide">
            <a href="{{ route('formnewclient') }}" class="btn btn-success">
              <i class="fa fa-fw fa-plus"></i>
              Add New Client
            </a>
            <a href="" class="btn btn-dark">
              Search
              <i class="fa fa-fw fa-search"></i>
            </a>
          </div>
        </div>
        <div class="row wrapper">
          <div class="col-sm-5 m-b-xs hide">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Bulk action</option>
              <option value="1">Delete selected</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>                
          </div>
          <div class="col-sm-7"></div>
          <div class="col-sm-5">
            <form method="GET" action="{{ route('quicksearchclient') }}">
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
                <th>Name</th>
                <th style="width:110px;"><i class="fa fa-cog"></i></th>
              </tr>
            </thead>
            <tbody>
              @if ($clients->isEmpty())
                <tr>
                  <td colspan="5">
                    <p class="text-center m-md">
                      Sorry, no clients found. 
                    </p>
                  </td>
                </tr>
              @else
                @foreach ($clients as $client)
                <tr>
                  <td class="hide"><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{ $client->name }}</td>
                  <td>
                    <a href class="active"><i class="glyphicon glyphicon-remove-sign text-danger"></i></a>
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
              <!--<select class="input-sm form-control w-sm inline v-middle">
                <option value="0">Bulk action</option>
                <option value="1">Delete selected</option>
                <option value="2">Bulk edit</option>
                <option value="3">Export</option>
              </select>-->
              <button class="btn btn-sm btn-default hide">Apply</button>                  
            </div>
            <div class="col-sm-5 text-center">
              <small class="text-muted inline m-t-sm m-b-sm">
                showing {{ $clients->firstItem() }}-{{ $clients->lastItem() }} of {{ $clients->total() }} items
              </small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
              <ul class="pagination pagination-sm m-t-none m-b-none">
                @if ($clients->onFirstPage())
                  <li class="disabled"><a><i class="fa fa-chevron-left"></i></a></li>
                @else
                  <li>
                    <a href="{{ $clients->previousPageUrl() }}"><i class="fa fa-chevron-left"></i></a>
                  </li>
                @endif

                @foreach ($clients->getUrlRange(1, $clients->lastPage()) as $page=>$url)
                  @if ($page == $clients->currentPage())
                    <li class="disabled"><a>{{ $page }}</a></li>
                  @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                  @endif
                @endforeach

                @if ($clients->hasMorePages())
                  <li><a href="{{ $clients->nextPageUrl() }}"><i class="fa fa-chevron-right"></i></a></li>
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