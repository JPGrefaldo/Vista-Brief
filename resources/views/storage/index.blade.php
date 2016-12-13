@extends('layouts.dashboard')

@section('title')
Storage - Vista
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
          <h1 class="m-n font-thin h3 text-black">Storage</h1>
          <small class="text-muted">Welcome</small>
        </div>
      </div>
    </div>
    <!-- / main header -->

    <div class="wrapper-md">
      <div class="row">

        <div class="panel panel-brand1">
          <div class="panel-heading">
            Temporarity PDF files
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-12">
                <p>These are the pdf files that is created and being sent as attachments to an email every time a planning request, brief sheets and amendments are made.</p>

                <p>They are temporary files that is stored in the system.</p>

                <p>It is advisable to clear this temporary files at least every 4 months.</p>

                <p>
                  There are <strong>{{$count}}</strong> temporary pdf files in the storage. 
                  @if ($count > 0)
                    <a class="btn btn-danger2 text-white">Delete All</a>
                  @endif
                </p>

                <div class="line line-dashed b-b line-lg"></div>

                <p>
                  <span class="checkbox checkbox-brand1">
                    <input 
                      id="option1" 
                      type="checkbox" 
                      name="deleteAllOnAdminSiginin">
                    <label for="option1">
                      Check this option to automatically clear all temporary pdf files every time <strong>I</strong> signin. (Admin account only)
                    </label>
                  </span>
                </p>

                <p>
                  <span class="checkbox checkbox-brand1">
                    <input 
                      id="option2" 
                      type="checkbox" 
                      name="deleteAllOnUserSiginin">
                    <label for="option2">
                      Check this option to automatically clear all temporary pdf files every time a <strong>User</strong> signin. (Any User)
                    </label>
                  </span>
                </p>

                <p>&nbsp;</p>

                <p class="text-center">
                  <a class="btn btn-brand1 btn-md">Save Option Changes</a>
                </p>

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


</div>