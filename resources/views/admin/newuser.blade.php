@extends('layouts.dashboard')

@section('title')
Add New User
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
          <h1 class="m-n font-thin h3 text-black">Add New User</h1>
          <small class="text-muted">welcome</small>
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md">
      <div class="row">
        <div class="col-sm-7">
          @if (count($errors) > 0)
            <div class="panel panel-danger">
              <div class="panel-body bg-ltdanger text-danger">
                <h4>Oh Snap!</h4>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          @endif
          <div class="panel panel-default">
            <form class="bs-example form-horizontal" action="{{ route('postnewuser') }}" method="post">
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-lg-3 control-label">Username</label>
                  <div class="col-lg-9">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Forename</label>
                  <div class="col-lg-9">
                    <input type="text" name="forename" class="form-control" placeholder="Forename">
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Surname</label>
                  <div class="col-lg-9">
                    <input type="text" name="surname" class="form-control" placeholder="Surname">
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Email</label>
                  <div class="col-lg-9">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Password</label>
                  <div class="col-lg-9">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Confirm Password</label>
                  <div class="col-lg-9">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                  </div>
                </div>

                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Your Password</label>
                  <div class="col-lg-9">
                    <input type="password" name="password_admin" class="form-control" placeholder="Verify by entering you Admin password">
                  </div>
                </div>              
              </div>
              <div class="panel-footer">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                  <div class="row">
                    <div class="col-lg-6">
                      <button type="submit" class="btn btn-sm btn-info btn-block">Save</button>
                    </div>
                    <div class="col-lg-6">
                      <a href="{{ url('/users') }}" class="btn btn-sm btn-danger btn-block">Cancel</a>
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