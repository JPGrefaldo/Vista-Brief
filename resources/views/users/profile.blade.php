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
    <!--<div style="background:url({{ URL::asset('images/c4.jpg')}}) center center; background-size:cover">-->
    <div style="background-color:#ececec">
      <div class="wrapper-lg bg-white-opacity">
        <div class="row m-t">
          <div class="col-sm-7">
            <a class="thumb-lg pull-left m-r">
              <img 
                src="{{ URL::asset('images/avatars') }}/{{ Auth::user()->avatar }}" 
                class="img-circle">
              <i id="btn-edit-avatar" class="fa fa-edit text-lg btn-edit-avatar" title="click to change photo"></i>
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
          <div 
            id="uploadphoto-box" 
            class="uploadphoto-box {{(count($errors->editAvatar)>0)?'':'defaultHidden'}}">
            <form 
              role="form" 
              enctype="multipart/form-data" 
              method="POST" 
              action="{{ route('postavatarupload') }}">
              <div class="form-group m-b-n">
                <div class="row m-b-n">
                  <div class="col-sm-12">
                    <label class="text-xs">Upload Profile Photo</label>
                  </div>
                  <div class="col-sm-8 m-r-n">
                    <input name="avatar" multiple ui-jq="filestyle" ui-options="{icon:false, buttonName:'btn-brand1 btn-sm input-sm', buttonText:'Browse'}" type="file">
                  </div>
                  <div class="col-sm-4 m-l-n">
                    {{ csrf_field() }}                      
                    <button 
                      class="form-control btn btn-brand1 btn-sm input-sm" 
                      style="margin-top:2px;"
                      type="submit">
                      Upload
                    </button>
                  </div>
                </div>
                <div class="m-t-md">
                  @if (count($errors->editAvatar) > 0)
                    <div class="alert alert-danger custom-text-danger-1 m-b-n">
                      <ul class="m-b-n m-l-n">
                        @foreach ($errors->editAvatar->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="wrapper bg-white b-b hide">
      <ul class="nav nav-pills nav-sm nav-pills-brand1">
        <li class="active"><a href="">Profile</a></li>
      </ul>
    </div>
    <div class="padder">      
      <div class="m-b padder-v">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="panel {{ (session('success_profile_changed')) ? 'panel-success' : 'panel-default' }}">
              <div class="panel-heading font-bold">
                Edit Profile
                @if (session('success_profile_changed'))
                  <span class="text-success2 font-normal pull-right">
                    {{ session('success_profile_changed') }}
                  </span>
                @endif
              </div>
              <div class="panel-body">
                <form role="form" method="post" action="{{ route('postupdateprofile') }}">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label><i>First Name</i></label>
                        <input 
                          class="form-control"
                          type="text" 
                          name="forename" 
                          placeholder="First Name" 
                          value="{{ (old('forename')) ? old('forename') : Auth::user()->forename }}" >
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
                          value="{{ (old('surname')) ? old('surname') : Auth::user()->surname }}" >
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <p style="height:14px;">&nbsp;</p>
                    </div>
                    <div class="col-sm-12 m-t-lg">
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
                  </div>

                  <div class="row">
                    @if (count($errors->editProfile) > 0)
                    <div class="col-sm-12 m-t-sm m-b-n">
                      <div class="alert alert-danger custom-text-danger-1">
                        <ul class="m-b-n m-l-n">
                          @foreach ($errors->editProfile->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                    @endif

                    <div class="col-sm-12 m-t-sm text-center">
                      {{ csrf_field() }}
                      <input type="submit" class="btn btn-brand1" value="Update Profile">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="panel {{ (session('success_password_changed')) ? 'panel-success' : 'panel-default' }}">
              <div class="panel-heading font-bold">
                Change Password
                @if (session('success_password_changed'))
                  <span class="text-success2 font-normal pull-right">
                    {{ session('success_password_changed') }}
                  </span>
                @endif
              </div>
              <div class="panel-body">
                <form role="form" method="post" action="{{ route('postupdateuserpassword') }}">
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
                  <div class="col-sm-12 m-t-lg">
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

                  @if (count($errors->changePassword) > 0)
                  <div class="col-sm-12 m-t-sm m-b-n">
                    <div class="alert alert-danger custom-text-danger-1">
                      <ul class="m-b-n m-l-n">
                        @foreach ($errors->changePassword->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                  @endif

                  <div class="col-sm-12 m-t-sm text-center">
                    {{ csrf_field() }}
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

  <!-- load ACTION JS scripts -->
  <script src="{{ URL::asset('js/user/action-userprofile-ui.js') }}"></script>

</div>
@endsection