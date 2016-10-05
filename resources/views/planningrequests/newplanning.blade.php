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
          <h1 class="m-n font-thin h3 text-black">Create New Planning Request</h1>
          <small class="text-muted">welcome</small>
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md">
      <div class="row">
        <div class="col-sm-12">          
          <form class="bs-example form-horizontal" action="{{ route('postnewuser') }}" method="post">
            <div class="panel panel-default">
              <div class="panel-heading">
                Information
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Client</label>
                      <div class="col-lg-9">
                        <input type="text" name="client" class="form-control" placeholder="Client">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Taken By</label>
                      <div class="col-lg-9">
                        <input type="text" name="projectstatus" class="form-control" placeholder="Taken By">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Contact Name/Title</label>
                      <div class="col-lg-9">
                        <input type="text" name="jobnumber" class="form-control" placeholder="Contact Name/Title">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Contact Email</label>
                      <div class="col-lg-9">
                        <input type="text" name="oldjobnumber" class="form-control" placeholder="Contact Email">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Contact Landline</label>
                      <div class="col-lg-9">
                        <input type="text" name="budget" class="form-control" placeholder="Contact Landline">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Contact Mobile</label>
                      <div class="col-lg-9">
                        <input type="text" name="pmanager" class="form-control" placeholder="Contact Mobile">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>               
              </div>
            </div>

            <!-- Job Details -->
            <div class="panel panel-default">
              <div class="panel-heading">
                01 - Job Details
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Title</label>
                      <div class="col-lg-9">
                        <input type="text" name="client" class="form-control" placeholder="Title">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Status</label>
                      <div class="col-lg-9">
                        <input type="text" name="projectstatus" class="form-control" placeholder="Status">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Budget</label>
                      <div class="col-lg-9">
                        <input type="text" name="client" class="form-control" placeholder="Budget">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Contact Email</label>
                      <div class="col-lg-9">
                        <input type="text" name="projectstatus" class="form-control" placeholder="Contact Email">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Job Details -->

            <!-- Timings -->
            <div class="panel panel-default">
              <div class="panel-heading">
                03 - Timings
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="row-fluid">
                      <div class="form-group">
                        <label class="col-lg-3 control-label text-left">Pitch/Quote</label>
                        <div class="col-lg-5" ng-controller="DatepickerDemoCtrl">
                          <div class="input-group w-md1">
                            <input type="text" class="form-control" name="quotereq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" placeholder="dd/mm/yy" />
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>                      
                          </div>
                        </div>
                        <div class="col-lg-4" ng-controller="DatepickerDemoCtrl">
                          <div class="input-group w-md1">
                            <input type="text" class="form-control" name="quotereq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" placeholder="hh:mm" />
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>                      
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row-fluid">
                      <div class="form-group">
                        <label class="col-lg-3 control-label text-left">Ideal Q&amp;A</label>
                        <div class="col-lg-5" ng-controller="DatepickerDemoCtrl">
                          <div class="input-group w-md1">
                            <input type="text" class="form-control" name="quotereq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" placeholder="dd/mm/yy" />
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>                      
                          </div>
                        </div>
                        <div class="col-lg-4" ng-controller="DatepickerDemoCtrl">
                          <div class="input-group w-md1">
                            <input type="text" class="form-control" name="quotereq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" placeholder="hh:mm" />
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>                      
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row-fluid">
                      <div class="form-group">
                        <label class="col-lg-3 control-label text-left">Ideal Q&amp;A</label>
                        <div class="col-lg-5" ng-controller="DatepickerDemoCtrl">
                          <div class="input-group w-md1">
                            <input type="text" class="form-control" name="quotereq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" placeholder="dd/mm/yy" />
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>                      
                          </div>
                        </div>
                        <div class="col-lg-4" ng-controller="DatepickerDemoCtrl">
                          <div class="input-group w-md1">
                            <input type="text" class="form-control" name="quotereq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" placeholder="hh:mm" />
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>                      
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row-fluid">
                      <div class="form-group">
                        <label class="col-lg-3 control-label text-left">Ideal Q&amp;A</label>
                        <div class="col-lg-5" ng-controller="DatepickerDemoCtrl">
                          <div class="input-group w-md1">
                            <input type="text" class="form-control" name="quotereq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" placeholder="dd/mm/yy" />
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>                      
                          </div>
                        </div>
                        <div class="col-lg-4" ng-controller="DatepickerDemoCtrl">
                          <div class="input-group w-md1">
                            <input type="text" class="form-control" name="quotereq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" placeholder="hh:mm" />
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                            </span>                      
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Desciplines Required -->

            <!-- Job Spec -->
            <div class="panel panel-default">
              <div class="panel-heading">
                03 - Job Spec
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      class="form-control" 
                      style="overflow:hidden;min-height:4px;" 
                      placeholder="Type the description of the work required"
                    ></textarea>
                  </div>          
                </div>
              </div>
            </div>
            <!-- / Job Spec -->
            
            <!-- Attachments -->
            <div class="panel panel-default">
              <div class="panel-heading">
                10 - Attachments
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n" style="height:100px">
                    <div class="col-lg-4 m-l-n">
                      <input ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn-primary'}" type="file">
                    </div>
                    <div class="col-lg-8 bg-ltblue text-center" style="height:100%;">
                      Drop Files Here
                    </div>
                  </div>           
                </div>
              </div>
            </div>
            <!-- / Attachments -->

            <div class="panel panel-default">
              <div class="panel-footer">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input type="submit" class="btn btn-lg btn-success btn-block" value="Submit">
              </div>
            </div>
          </form>
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