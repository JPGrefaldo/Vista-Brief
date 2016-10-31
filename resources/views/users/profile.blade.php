@extends('layouts.dashboard')

@section('title')
Profile - Vista
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
      

<div class="hbox hbox-auto-xs hbox-auto-sm">
  <div class="col">
    <div style="background:url({{ URL::asset('images/c4.jpg')}}) center center; background-size:cover">
      <div class="wrapper-lg bg-white-opacity">
        <div class="row m-t">
          <div class="col-sm-7">
            <a href class="thumb-lg pull-left m-r">
              <img src="{{ URL::asset('images/user_avatar_default.png')}}" class="img-circle">
            </a>
            <div class="clear m-b">
              <div class="m-b m-t-sm">
                <span class="h3 text-black">
                  {{ Auth::user()->forename }} 
                  {{ Auth::user()->surname }}
                </span>
                <small class="m-l hide">
                  <!-- -->
                </small>
              </div>
              <p class="m-b">                
                <small class="m-l1">
                  {{ Auth::user()->email }}
                </small>
              </p>
              <p class="m-b hide">
                <a href class="btn btn-sm btn-bg btn-rounded btn-default btn-icon"><i class="fa fa-twitter"></i></a>
                <a href class="btn btn-sm btn-bg btn-rounded btn-default btn-icon"><i class="fa fa-facebook"></i></a>
                <a href class="btn btn-sm btn-bg btn-rounded btn-default btn-icon"><i class="fa fa-google-plus"></i></a>
              </p>
              <a href class="btn btn-sm btn-success btn-rounded hide">Follow</a>
            </div>
          </div>
          <div class="col-sm-5 hide">
            <div class="pull-right pull-none-xs text-center">
              <a href class="m-b-md inline m">
                <span class="h3 block font-bold">2k</span>
                <small>Followers</small>
              </a>
              <a href class="m-b-md inline m">
                <span class="h3 block font-bold">250</span>
                <small>Following</small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm nav-pills-brand1">
        <li class="active"><a>Profile</a></li>
        <li class=""><a>Change Photo</a></li>
      </ul>
    </div>
    <div class="padder">      
      <div class="m-l-lg m-b padder-v">
        <div class="row">
          <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading font-bold">Edit Profile</div>
              <div class="panel-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label><i>Forename</i></label>
                        <input 
                          class="form-control"
                          type="text" 
                          name="forename" 
                          placeholder="Forename" 
                          value="{{ Auth::user()->forename }}" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label><i>Surname</i></label>
                        <input 
                          class="form-control"
                          type="text" 
                          name="surname" 
                          placeholder="surname" 
                          value="{{ Auth::user()->surname }}" >
                      </div>
                    </div>
                    <div class="col-sm-12 m-t-lg bg-light">
                      <label><i>Type your current password for security verification</i></label>
                      <input 
                        class="form-control"
                        type="password" 
                        name="current_password"
                        placeholder="Type your current password" 
                        value="" 
                        autocomplete="off">
                      <p>&nbsp;</p>
                    </div>
                    <div class="col-sm-12 m-t-sm text-center">
                      <input type="submit" class="btn btn-brand1" value="Save Changes">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading font-bold">Change Password</div>
              <div class="panel-body">
                <form role="form">
                  <div class="form-group">
                    <div class="row">
                      <label class="col-sm-4"><i>New password</i></label>
                      <div class="col-sm-8">
                        <input 
                          class="form-control"
                          type="password" 
                          name="password" 
                          placeholder="type your new password here" 
                          value="" >
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <label class="col-sm-4"><i>Re-type new password</i></label>
                      <div class="col-sm-8">
                        <input 
                          class="form-control"
                          type="password" 
                          name="password_confirmation" 
                          placeholder="re-type your new password here" 
                          value="" >
                        </div>
                      </div>
                  </div>
                  <div class="col-sm-12 m-t-lg bg-light">
                    <label><i>Type your current password for security verification</i></label>
                    <input 
                      class="form-control"
                      type="password" 
                      name="current_password"
                      placeholder="Type your current password" 
                      value="" 
                      autocomplete="off">                    
                    <p>&nbsp;</p>
                  </div>
                  <div class="col-sm-12 m-t-sm text-center">
                    <input type="submit" class="btn btn-brand1" value="Update Password">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


    </div>
  </div>
  <!-- /content -->
  
  <!-- footer -->
  @include('includes.dashboard-footer')
  <!-- / footer -->



</div>
@endsection