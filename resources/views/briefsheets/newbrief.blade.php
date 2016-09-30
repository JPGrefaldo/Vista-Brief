@extends('layouts.dashboard')

@section('title')
Add New Brief Sheet
@endsection

@section('content')
<div class="app app-header-fixed ">
  

  <!-- header -->
  @include('includes.dashboard-header')
  <!-- / header -->


    <!-- aside -->
  <aside id="aside" class="app-aside hidden-xs bg-blue-1">
      <div class="aside-wrap">
        <div class="navi-wrap">
          <!-- nav -->
          @include('includes.mainmenu-left')
          <!-- nav -->
        </div>
      </div>
  </aside>
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
          <h1 class="m-n font-thin h3 text-black">Add New Brief Sheet</h1>
          <small class="text-muted">welcome</small>
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default">
            <form class="bs-example form-horizontal" action="{{ route('postnewuser') }}" method="post">
              <div class="panel-body">
                <div class="form-group">
                  <div class="row-fluid">
                    <div class="col-lg-6">
                      <div class="row">
                        <label class="col-lg-3 control-label text-left">Client</label>
                        <div class="col-lg-9">
                          <input type="text" name="username" class="form-control" placeholder="Client">
                          <span class="help-block m-b-none"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="row">
                        <label class="col-lg-3 control-label text-left">Project Status</label>
                        <div class="col-lg-9">
                          <input type="text" name="username" class="form-control" placeholder="Project Status">
                          <span class="help-block m-b-none"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row-fluid">
                    <div class="col-lg-6">
                      <div class="row">
                        <label class="col-lg-3 control-label text-left">Job Number</label>
                        <div class="col-lg-9">
                          <input type="text" name="username" class="form-control" placeholder="Job Number">
                          <span class="help-block m-b-none"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="row">
                        <label class="col-lg-3 control-label text-left">Old Job Number</label>
                        <div class="col-lg-9">
                          <input type="text" name="username" class="form-control" placeholder="Old Job Number">
                          <span class="help-block m-b-none"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row-fluid">
                    <div class="col-lg-6">
                      <div class="row">
                        <label class="col-lg-3 control-label text-left">Your Budget <i class="icon icon-question"></i></label>
                        <div class="col-lg-9">
                          <input type="text" name="username" class="form-control" placeholder="Your Budget">
                          <span class="help-block m-b-none"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="row">
                        <label class="col-lg-3 control-label text-left">Project Manager</label>
                        <div class="col-lg-9">
                          <input type="text" name="username" class="form-control" placeholder="Project Manager">
                          <span class="help-block m-b-none"></span>
                        </div>
                      </div>
                    </div>
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
                    <input type="password" name="confirmpwd" class="form-control" placeholder="Confirm Password">
                  </div>
                </div>

                <div class="line dk"></div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Your Password</label>
                  <div class="col-lg-9">
                    <input type="password" name="adminpwd" class="form-control" placeholder="Verify by entering you password">
                  </div>
                </div>              
              </div>
              <div class="panel-footer">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                  <button type="submit" class="btn btn-sm btn-info">Save</button>
                  <a href="{{ url('/briefs') }}" class="btn btn-sm btn-warning">Cancel</a>
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