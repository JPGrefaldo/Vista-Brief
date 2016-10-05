@extends('layouts.dashboard')

@section('title')
Draft - Brief Sheet
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
    <div class="bg-light lter b-b wrapper-md hide">
      <div class="row">
        <div class="col-sm-6 col-xs-12">
          <h1 class="m-n font-thin h3 text-black">Edit Drafted Brief Sheet</h1>
          <small class="text-muted">welcome</small>
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-info">
            <div class="panel-body bg-ltinfo">
              <strong>Draft.</strong> This brief sheet has not been submitted yet.
            </div>
          </div>
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
                        <select name="client" class="form-control">
                          <option value="0">select</option>
                          <option selected>Option 1</option>
                          <option>Option 2</option>
                          <option>Option 3</option>
                        </select>
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Project Status</label>
                      <div class="col-lg-9">
                        <select name="projectstatus" class="form-control">
                          <option value="0">select</option>
                          <option>Pitch</option>
                          <option selected>Quote</option>
                          <option>Live</option>
                        </select>
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
                        <input type="text" name="jobnumber" class="form-control" placeholder="Job Number" value="123456789">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Old Job Number</label>
                      <div class="col-lg-9">
                        <input type="text" name="oldjobnumber" class="form-control" placeholder="987654321">
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
                        <input type="text" name="budget" class="form-control" placeholder="Your Budget" value="1000.00">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Project Manager</label>
                      <div class="col-lg-9">
                        <input type="text" name="pmanager" class="form-control" placeholder="Project Manager" value="sample manager">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label text-left">Job Name <i class="icon icon-question"></i></label>
                  <div class="col-lg-10">
                    <input type="text" name="jobname" class="form-control" placeholder="Job Name" value="sample job name">
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label text-left">Key Deliverables <i class="icon icon-question"></i></label>
                  <div class="col-lg-10">
                    <input type="text" name="keydeliv" class="form-control" placeholder="Key Deliverables" value="sample deliverables">
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>

                <!-- Required dates -->
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="col-lg-6 control-label text-left">Quote Required by</label>
                      <div class="col-lg-6" ng-controller="DatepickerDemoCtrl">
                        <div class="input-group w-md1">
                          <input type="text" class="form-control" name="quotereq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" value="1/2/2016" />
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
                        <div class="input-group w-md1">
                          <input type="text" class="form-control" name="proposedreq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" value="1/2/2016" />
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
                        <div class="input-group w-md1">
                          <input type="text" class="form-control" name="stagereq" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" value="1/2/2016" />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="col-lg-6 control-label text-left">Projects Delivered by</label>
                      <div class="col-lg-6" ng-controller="DatepickerDemoCtrl">
                        <div class="input-group w-md1">
                          <input type="text" class="form-control" name="projdel" datepicker-popup="" ng-model="dt" is-open="opened" datepicker-options="dateOptions" ng-required="true" close-text="Close" value="1/2/2016" />
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
            </div>
            
            <div class="line line-dashed b-b line-lg pull-in hide"></div>

            <!-- Brief Summary -->
            <div class="panel panel-default">
              <div class="panel-heading">
                01 - Brief Summary
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea class="form-control" style="overflow:auto;min-height:50px" placeholder="Enter short overview description of the requirements here.">sample brief</textarea>
                  </div>            
                </div>
              </div>
            </div>
            <!-- / Brief Summary -->

            <!-- Desciplines Required -->
            <div class="panel panel-default">
              <div class="panel-heading">
                02 - Disciplines Required
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <div class="row-fluid">
                    <div class="col-lg-3">
                      <div class="checkbox1">
                        <label class="checkboc-inline">
                          Events <input type="checkbox" checked><i></i>                        
                        </label>
                      </div>           
                    </div>
                    <div class="col-lg-3">
                      <div class="checkbox1">
                        <label class="checkboc-inline">
                          Strategy <input type="checkbox"><i></i>                        
                        </label>
                      </div>           
                    </div>
                    <div class="col-lg-3">
                      <div class="checkbox1">
                        <label class="checkboc-inline">
                          Content <input type="checkbox"><i></i>                        
                        </label>
                      </div>           
                    </div>
                    <div class="col-lg-3">
                      <div class="checkbox1">
                        <label class="checkboc-inline">
                          Design <input type="checkbox" checked><i></i>                        
                        </label>
                      </div>           
                    </div>
                    <div class="col-lg-3">
                      <div class="checkbox1">
                        <label class="checkboc-inline">
                          Digital <input type="checkbox"><i></i>                        
                        </label>
                      </div>           
                    </div>
                    <div class="col-lg-3">
                      <div class="checkbox1">
                        <label class="checkboc-inline">
                          Film <input type="checkbox" checked><i></i>                        
                        </label>
                      </div>           
                    </div>
                    <div class="col-lg-3">
                      <div class="checkbox1">
                        <label class="checkboc-inline">
                          Exhibitions <input type="checkbox" checked><i></i>                        
                        </label>
                      </div>           
                    </div>
                    <div class="col-lg-3">
                      <div class="checkbox1">
                        <label class="checkboc-inline">
                          VenueHub <input type="checkbox" checked><i></i>                        
                        </label>
                      </div>           
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Desciplines Required -->

            <!-- Objectives / Measure -->
            <div class="panel panel-default">
              <div class="panel-heading">
                03 - Objectives / Measure
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      class="form-control" 
                      style="overflow:hidden;min-height:120px;" 
                      placeholder="*What does the client want to achieve?&#10;*Why?&#10;*What difference will that make to their business / audience / etc?&#10;*What does success looks like?&#10;*How will it be measured?"
                    >sample objective</textarea>
                  </div>          
                </div>
              </div>
            </div>
            <!-- / Objectives / Measure -->

            <!-- Context -->
            <div class="panel panel-default">
              <div class="panel-heading">
                04 - Context
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      class="form-control" 
                      style="overflow:hidden;min-height:100px;" 
                      placeholder="*What is the background on the client?&#10;*What is the background on the issue?&#10;*Are there any other influencing issues?&#10;*Anything else we need to do?"
                    >sample context</textarea>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Context -->

            <!-- Target Audience and Insight -->
            <div class="panel panel-default">
              <div class="panel-heading">
                05 - Target Audience and Insight
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      class="form-control" 
                      style="overflow:hidden;min-height:80px;" 
                      placeholder="*Who?&#10;*What do we know about them that's relevant to this brief?&#10;*What do we need to find out?"
                    >sample insight</textarea>
                  </div>         
                </div>
              </div>
            </div>
            <!-- / Target Audience and Insight -->

            <!-- What do want the target audience to -->
            <div class="panel panel-default">
              <div class="panel-heading">
                06 - What do want the target audience to ...
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <div class="col-lg-4 m-b-n">
                      <textarea 
                      class="form-control m-l-n m-r-n" 
                      style="overflow:hidden;min-height:80px;" 
                      placeholder="Think?"
                      >sample think</textarea>
                    </div>
                    <div class="col-lg-4 m-b-n">
                      <textarea 
                      class="form-control m-l-n m-r-n" 
                      style="overflow:hidden;min-height:80px;" 
                      placeholder="Feel?"
                      >sample feel</textarea>
                    </div>
                    <div class="col-lg-4 m-b-n">
                      <textarea 
                      class="form-control m-l-n m-r-n" 
                      style="overflow:hidden;min-height:80px;" 
                      placeholder="Do?"
                      >sample do</textarea>
                    </div>
                  </div>            
                </div>
              </div>
            </div>
            <!-- / What do want the target audience to -->

            <!-- Key Messages / Propositions -->
            <div class="panel panel-default">
              <div class="panel-heading">
                07 - Key Messages / Propositions
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      class="form-control" 
                      style="overflow:hidden;min-height:80px;" 
                      placeholder="*What's the key message(s) that we want to convey?&#10;*What action or mindset do we want to provoke?&#10;*What's the key benefit(s) for the audience?"
                    >sample propositions</textarea>
                  </div>             
                </div>
              </div>
            </div>
            <!-- / Key Messages / Propositions -->

            <!-- Creative -->
            <div class="panel panel-default">
              <div class="panel-heading">
                08 - Creative
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      class="form-control" 
                      style="overflow:hidden;min-height:80px;" 
                      placeholder="*Any creative steer from the client, likes and preferences?&#10;*Creative context / routes to avoid / recent campaigns to be aware of?&#10;*Any existing logos, brand guidelines or TOV?"
                    >sample creative</textarea>
                  </div>            
                </div>
              </div>
            </div>
            <!-- / Creative -->

            <!-- Budget, Timings and Outputs Required -->
            <div class="panel panel-default">
              <div class="panel-heading">
                09 - Budget, Timings and Outputs Required
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      class="form-control" 
                      style="overflow:hidden;min-height:100px;" 
                      placeholder="*What immediate outputs are required?&#10;*What are the next steps?&#10;*What budget has the client or account lead set for this work?&#10;*What deadline are we working to?"
                    >sample budget</textarea>
                  </div>           
                </div>
              </div>
            </div>
            <!-- / Budget, Timings and Outputs Required -->

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

            <!-- Notes -->
            <div class="panel panel-default">
              <div class="panel-body">
                Need help writing the brief? Click here and request Specialist Support. Remember to save your brief as draft before closing.
              </div>
            </div>
            <!-- / Notes -->


            <div class="panel panel-default">
              <div class="panel-footer">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <div class="row">
                  <div class="col-lg-6">
                    <!--<input type="submit" class="btn btn-lg btn-info btn-block" value="Save as Draft">-->
                    <a href="{{ route('draftedbriefsheet') }}" class="btn btn-lg btn-info btn-block">Save as Draft</a>
                  </div>
                  <div class="col-lg-6">
                    <!--<input type="submit" class="btn btn-lg btn-success btn-block" value="Submit">-->
                    <a href="{{ route('submittedbriefsheet') }}" class="btn btn-lg btn-success btn-block">Submit</a>
                  </div>
                </div>
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