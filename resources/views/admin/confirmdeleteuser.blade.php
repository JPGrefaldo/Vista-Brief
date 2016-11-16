@extends('layouts.dashboard')

@section('title')
Delete User
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
          <h1 class="m-n font-thin h3 text-black">Delete User</h1>
          <small class="text-muted">welcome</small>
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          
          <div class="panel panel-default">            
            <form class="bs-example form-horizontal" action="{{ route('deleteuser') }}" method="post">
              <div class="panel-body">
                <div class="form-group">
                  <div class="col-lg-12 text-center">
                    <h3>
                      Are you sure you want to remove the account of 
                    </h3>                    
                    <h3>
                      `{{ $user->forename }} {{ $user->surname }}`
                    </h3>
                  </div>
                </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col-lg-2 m-b-sm">
                    <a href="{{ route('users') }}" class="btn btn-default btn-block">Cancel</a>
                  </div>
                  <div class="col-lg-10 m-b-sm">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-md btn-brand1 btn-block">Confirm</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
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