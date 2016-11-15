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
        <div class="col-sm-12 col-xs-12">
          <h1 class="m-n font-thin h3 text-black">Clients</h1>
          <small class="text-muted">welcome</small>
          @if (session('client_delete_success'))
            <span class="pull-right alert-success p-r-sm p-l-sm">{{ session('client_delete_success') }}</span>
          @endif
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          List of Clients
          <div class="text-right hide">
            <a href="" class="btn btn-success">
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
          <table class="table table-striped table-hover table-hover-blue b-t b-light">
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
            <tbody id="client-list-module">
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
                  <td class="hide">
                    <label class="i-checks m-b-none">
                      <input type="checkbox" name="post[]"><i></i></label>
                  </td>
                  <td>
                    <div class="client-name-block">
                      {{ $client->name }}
                    </div>
                    <div class="client-edit-block"></div>
                  </td>
                  <td>
                    <a class="m-r-sm active action-trigger-edit">
                      <i class="fa fa-pencil text-brand-1 text-muted"></i>
                    </a>
                    <a
                      class="active action-delete" 
                      data-dname="{{ $client->name }}" 
                      data-did="{{ $client->id }}">
                      <i class="glyphicon glyphicon-remove-sign text-danger"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              @endif
            </tbody>
          </table>
          <!-- CLIENT EDIT TEMPLATE -->
          <div id="client-edit-template" class="hide">
            <form method="POST" action="{{route('posteditclient')}}">
            <div class="row">
              <div class="col-sm-9">
                <input 
                  class="form-control" 
                  type="text" 
                  name="name" 
                  placeholder="type the new client name here">
                <input type="hidden" name="id">
                {{ csrf_field() }}
              </div>
              <div class="col-sm-3">
                <button class="btn btn-brand1 btn-sm m-t-xs btn-edit-save">save</button>
                <button class="btn btn-default btn-sm m-t-xs btn-edit-cancel">cancel</button>
              </div>
            </div>
            </form>
          </div>
          <!-- / CLIENT EDIT TEMPLATE -->
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
    <div class="wrapper-md col-sm-4">
      @if (count($errors) > 0)
      <div class="panel panel-default">
          <div class="alert alert-danger text-danger m-b-n">
            <ul class="m-b-n">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
      </div>
      @endif

      @if (session('edit_client_success'))
        <span class="pull-right alert-success p-r-sm p-l-sm">{{ session('edit_client_success') }}</span>
      @endif
    </div>

    <!-- Modal: Confirm Delete -->
    <div id="modal-confirm-delete-client" class="modal" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirm Delete</h4>
          </div>
          <div class="modal-body text-center">
            <h3>Are you sure you want to delete '<span id="client-name"></span>'</h3>
            <input type="hidden" id="id-to-be-deleted" name="id-to-be-deleted">      
          </div>
          <div class="modal-footer">
            <div class="row">
              <div class="col-sm-4">
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
              </div>
              <div class="col-sm-8">
                <button type="button" class="btn btn-brand1 btn-block" id="btn-client-delete">Confirm</button>
              </div>
            </div>
          </div>
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

  <script src="{{ URL::asset('js/client/action-client-edit.js') }}"></script>
  <script src="{{ URL::asset('js/client/action-client-delete-client.js') }}"></script>

</div>
@endsection