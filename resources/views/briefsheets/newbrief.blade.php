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
                      <label class="col-lg-3 control-label text-left">Project Status</label>
                      <div class="col-lg-9">
                        <input type="text" name="projectstatus" class="form-control" placeholder="Project Status">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Job Number</label>
                      <div class="col-lg-9">
                        <input type="text" name="jobnumber" class="form-control" placeholder="Job Number">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Old Job Number</label>
                      <div class="col-lg-9">
                        <input type="text" name="oldjobnumber" class="form-control" placeholder="Old Job Number">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Your Budget <i class="icon icon-question"></i></label>
                      <div class="col-lg-9">
                        <input type="text" name="budget" class="form-control" placeholder="Your Budget">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Project Manager</label>
                      <div class="col-lg-9">
                        <input type="text" name="pmanager" class="form-control" placeholder="Project Manager">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label text-left">Job Name <i class="icon icon-question"></i></label>
                  <div class="col-lg-10">
                    <input type="text" name="jobname" class="form-control" placeholder="Job Name">
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label text-left">Key Deliverables <i class="icon icon-question"></i></label>
                  <div class="col-lg-10">
                    <input type="text" name="keydeliv" class="form-control" placeholder="Key Deliverables">
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>

                <!-- Required dates -->
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="col-lg-6 control-label text-left">Quote Required by</label>
                      <div class="col-lg-6" ng-controller="DatepickerDemoCtrl">
                        <div class="input-group w-md">
                          <input type="text" class="form-control" name="quotereq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="col-lg-6 control-label text-left">Proposed Required by</label>
                      <div class="col-lg-6" ng-controller="DatepickerDemoCtrl">
                        <div class="input-group w-md">
                          <input type="text" class="form-control" name="proposedreq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="col-lg-6 control-label text-left">1st Stage Required by</label>
                      <div class="col-lg-6" ng-controller="DatepickerDemoCtrl">
                        <div class="input-group w-md">
                          <input type="text" class="form-control" name="stagereq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                          </span>                      
                        </div>
                      </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="col-lg-6 control-label text-left">Projects Delivered by</label>
                      <div class="col-lg-6" ng-controller="DatepickerDemoCtrl">
                        <div class="input-group w-md">
                          <input type="text" class="form-control" name="projdel" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- / Required dates -->

              <div class="line line-dashed b-b line-lg pull-in"></div>

              <!-- Brief Summary -->
              <div class="row-fluid">
                <div class="form-group">
                  <label class="control-label">01 - Brief Summary</label>
                    <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">
                      <div class="btn-group dropdown" dropdown>
                        <a class="btn btn-default" dropdown-toggle tooltip="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href data-edit="fontName Serif" style="font-family:'Serif'">Serif</a></li> 
                          <li><a href data-edit="fontName Sans" style="font-family:'Sans'">Sans</a></li>
                          <li><a href data-edit="fontName Arial" style="font-family:'Arial'">Arial</a></li></ul>
                      </div>
                      <div class="btn-group dropdown" dropdown>
                        <a class="btn btn-default" dropdown-toggle data-toggle="dropdown" tooltip="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href data-edit="fontSize 5" style="font-size:24px">Huge</a></li>
                          <li><a href data-edit="fontSize 3" style="font-size:18px">Normal</a></li>
                          <li><a href data-edit="fontSize 1" style="font-size:14px">Small</a></li>
                        </ul>
                      </div>
                      <div class="btn-group">
                        <a class="btn btn-default" data-edit="bold" tooltip="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                        <a class="btn btn-default" data-edit="italic" tooltip="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                        <a class="btn btn-default" data-edit="strikethrough" tooltip="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                        <a class="btn btn-default" data-edit="underline" tooltip="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                      </div>
                      <div class="btn-group">
                        <a class="btn btn-default" data-edit="insertunorderedlist" tooltip="Bullet list"><i class="fa fa-list-ul"></i></a>
                        <a class="btn btn-default" data-edit="insertorderedlist" tooltip="Number list"><i class="fa fa-list-ol"></i></a>
                        <a class="btn btn-default" data-edit="outdent" tooltip="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                        <a class="btn btn-default" data-edit="indent" tooltip="Indent (Tab)"><i class="fa fa-indent"></i></a>
                      </div>
                      <div class="btn-group">
                        <a class="btn btn-default" data-edit="justifyleft" tooltip="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                        <a class="btn btn-default" data-edit="justifycenter" tooltip="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                        <a class="btn btn-default" data-edit="justifyright" tooltip="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                        <a class="btn btn-default" data-edit="justifyfull" tooltip="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                      </div>
                      <div class="btn-group dropdown" dropdown>
                        <a class="btn btn-default" dropdown-toggle tooltip="Hyperlink"><i class="fa fa-link"></i></a>
                        <div class="dropdown-menu">
                          <div class="input-group m-l-xs m-r-xs">
                            <input class="form-control input-sm" id="LinkInput" placeholder="URL" type="text" data-edit="createLink"/>
                            <div class="input-group-btn">
                              <button class="btn btn-sm btn-default" type="button">Add</button>
                            </div>
                          </div>
                        </div>
                        <a class="btn btn-default" data-edit="unlink" tooltip="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                      </div>
                      
                      <div class="btn-group">
                        <a class="btn btn-default" tooltip="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                        <input type="file" data-edit="insertImage" style="position:absolute; opacity:0; width:41px; height:34px" />
                      </div>
                      <div class="btn-group">
                        <a class="btn btn-default" data-edit="undo" tooltip="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                        <a class="btn btn-default" data-edit="redo" tooltip="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                      </div>
                    </div>
                    <div ui-jq="wysiwyg" class="form-control" style="overflow:scroll;height:200px;max-height:200px">
                      Go ahead&hellip;
                    </div>
                </div>            
              </div>
              <!-- / Brief Summary -->

              <!-- Desciplines Required -->
              <div class="row">
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="col-lg-3 control-label text-left">Events</label>
                    <div class="col-lg-9">
                      <input type="text" name="jobnumber" class="form-control" placeholder="Job Number">
                      <span class="help-block m-b-none"></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- / Desciplines Required -->


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