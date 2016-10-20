@extends('layouts.dashboard')

@section('title')
Submitted - Brief Sheet
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

    <div class="wrapper-md" id="briefwrapper">
      <div class="row">
        <div class="col-sm-12">    
          <div class="panel panel-info">
            <div class="panel-body bg-danger">
              <strong>Submitted.</strong> You can't edit this brief sheet as this had been submitted. You can add amends.
            </div>
          </div>

            <!-- Information -->
            <div class="panel panel-default">
              <div class="panel-heading">
                Information
              </div>
              <div class="panel-body bg-light lter">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Client</label>
                      <div class="col-lg-9">
                        <select id="select-client" name="client" class="form-control" disabled>
                          <option value="{{ $brief->client_id }}">{{ $brief->client->name }}</option>
                        </select>
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Project Status</label>
                      <div class="col-lg-9">
                        <select name="projectstatus" class="form-control" disabled>
                          <option value="{{ $brief->projectstatus_id }}">{{ $brief->projectstatus->name }}</option>
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
                        <input 
                          type="text" 
                          name="jobnumber" 
                          class="form-control" 
                          placeholder="Job Number" 
                          value="{{ $brief->jobnumber }}" 
                          disabled>
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Old Job Number</label>
                      <div class="col-lg-9">
                        <input 
                          type="text" 
                          name="oldjobnumber" 
                          class="form-control" 
                          placeholder="Old Job Number" 
                          value="{{ $brief->old_jobnumber }}" 
                          disabled>
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
                        <input 
                          type="text" 
                          name="budget" 
                          class="form-control" 
                          placeholder="Your Budget" 
                          value="{{ $brief->budget }}" 
                          disabled>
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">Project Manager</label>
                      <div class="col-lg-9">
                        <input 
                          type="text" 
                          name="pmanager" 
                          class="form-control" 
                          placeholder="Project Manager" 
                          value="{{ $brief->projectmanager }}" 
                          disabled>
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label text-left">Job Name <i class="icon icon-question"></i></label>
                  <div class="col-lg-10">
                    <input 
                      type="text" 
                      name="jobname" 
                      class="form-control" 
                      placeholder="Job Name" 
                      value="{{ $brief->jobname }}" 
                      disabled>
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label text-left">Key Deliverables <i class="icon icon-question"></i></label>
                  <div class="col-lg-10">
                    <input 
                      type="text" 
                      name="keydeliverables" 
                      class="form-control" 
                      placeholder="Key Deliverables" 
                      value="{{ $brief->keydeliverables }}" 
                      disabled>
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>

                <!-- Required dates -->
                <div class="row">
                  <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                      <label class="col-lg-5 control-label text-left text-sm">Quote Required by</label>
                      <div class="col-lg-7">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="quotereq" 
                            value="@if(!empty($brief->quoted_required_by_at)) {{ $brief->quoted_required_by_at->format('m/d/Y') }} @endif" 
                            readonly 
                            disabled />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_quotereq" disabled>
                              <i class="glyphicon glyphicon-calendar"></i>
                            </button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                      <label class="col-lg-5 control-label text-left text-sm">Proposed Required by</label>
                      <div class="col-lg-7">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="proposedreq" 
                            value="@if(!empty($brief->proposal_required_by_at)) {{ $brief->proposal_required_by_at->format('m/d/Y') }} @endif"
                            readonly 
                            disabled />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_proposedreq" disabled>
                              <i class="glyphicon glyphicon-calendar"></i>
                            </button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                      <label class="col-lg-5 control-label text-left text-sm">1st Stage Required by</label>
                      <div class="col-lg-7" ng-controller="DatepickerDemoCtrl">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="stagereq" 
                            value="@if(!empty($brief->firststage_required_by_at)) {{ $brief->firststage_required_by_at->format('m/d/Y') }} @endif" 
                            readonly 
                            disabled />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_stagereq" disabled>
                              <i class="glyphicon glyphicon-calendar"></i>
                            </button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                      <label class="col-lg-5 control-label text-left text-sm">Projects Delivered by</label>
                      <div class="col-lg-7" ng-controller="DatepickerDemoCtrl">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="projdelivered" 
                            value="@if(!empty($brief->project_delivered_by_at)) {{ $brief->project_delivered_by_at->format('m/d/Y') }} @endif"
                            readonly 
                            disabled />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_projdelivered" disabled>
                              <i class="glyphicon glyphicon-calendar"></i>
                            </button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- / Required dates -->
            </div>
            <!-- / Information -->
            
            <div class="line line-dashed b-b line-lg pull-in hide"></div>

            <!-- Brief Summary -->
            <div class="panel panel-default">
              <div class="panel-heading">
                01 - Brief Summary
              </div>
              <div class="panel-body bg-light lter">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      name="summary" 
                      class="form-control" 
                      style="overflow:auto;min-height:50px" 
                      placeholder="Enter short overview description of the requirements here." 
                      disabled
                      >{{ $brief->summary }}</textarea>
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
              <div class="panel-body bg-light lter">
                <div class="form-group">
                  <div class="row-fluid">
                    @foreach ($departments as $department)
                      <div class="col-lg-3">
                        <div class="checkbox1">
                          <label class="checkboc-inline">
                            {{ $department->name }} 
                            <input 
                              disabled
                              type="checkbox" 
                              name="department[{{ $department->id }}]" 
                              value="{{ $department->id }}"                              
                              @if(in_array($department->id, explode(',',$brief->disciplines_required_ids)))
                                checked
                              @endif
                              >
                            <i></i>
                          </label>
                        </div>           
                      </div>
                    @endforeach
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
              <div class="panel-body bg-light lter">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea
                      name="objmeasure" 
                      class="form-control" 
                      style="overflow:hidden;min-height:120px;" 
                      placeholder="*What does the client want to achieve?&#10;*Why?&#10;*What difference will that make to their business / audience / etc?&#10;*What does success looks like?&#10;*How will it be measured?" 
                      disabled
                    >{{ $brief->objectives_or_measures }}</textarea>
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
              <div class="panel-body bg-light lter">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea
                      name="context" 
                      class="form-control" 
                      style="overflow:hidden;min-height:100px;" 
                      placeholder="*What is the background on the client?&#10;*What is the background on the issue?&#10;*Are there any other influencing issues?&#10;*Anything else we need to do?" 
                      disabled
                    >{{ $brief->content }}</textarea>
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
              <div class="panel-body bg-light lter">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      name="targetaudience_insight"
                      class="form-control" 
                      style="overflow:hidden;min-height:80px;" 
                      placeholder="*Who?&#10;*What do we know about them that's relevant to this brief?&#10;*What do we need to find out?" 
                      disabled
                    >{{ $brief->targetaudience_and_insight }}</textarea>
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
              <div class="panel-body bg-light lter">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <div class="col-lg-4 m-b-n">
                      <textarea 
                      name="targetaudience_think"
                      class="form-control m-l-n m-r-n" 
                      style="overflow:hidden;min-height:80px;" 
                      placeholder="Think?" 
                      disabled
                      >{{ $brief->targetaudience_think }}</textarea>
                    </div>
                    <div class="col-lg-4 m-b-n">
                      <textarea 
                      name="targetaudience_feel"
                      class="form-control m-l-n m-r-n" 
                      style="overflow:hidden;min-height:80px;" 
                      placeholder="Feel?" 
                      disabled
                      >{{ $brief->targetaudience_feel }}</textarea>
                    </div>
                    <div class="col-lg-4 m-b-n">
                      <textarea 
                      name="targetaudience_do"
                      class="form-control m-l-n m-r-n" 
                      style="overflow:hidden;min-height:80px;" 
                      placeholder="Do?" 
                      disabled
                      >{{ $brief->targetaudience_do }}</textarea>
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
              <div class="panel-body bg-light lter">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      name="keymsg_propositions" 
                      class="form-control" 
                      style="overflow:hidden;min-height:80px;" 
                      placeholder="*What's the key message(s) that we want to convey?&#10;*What action or mindset do we want to provoke?&#10;*What's the key benefit(s) for the audience?" 
                      disabled
                    >{{ $brief->keymessages_or_propositions }}</textarea>
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
              <div class="panel-body bg-light lter">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      name="creative"
                      class="form-control" 
                      style="overflow:hidden;min-height:80px;" 
                      placeholder="*Any creative steer from the client, likes and preferences?&#10;*Creative context / routes to avoid / recent campaigns to be aware of?&#10;*Any existing logos, brand guidelines or TOV?" 
                      disabled
                    >{{ $brief->creative }}</textarea>
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
              <div class="panel-body bg-light lter">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      name="budget_timings_outputs_req"
                      class="form-control" 
                      style="overflow:hidden;min-height:100px;" 
                      placeholder="*What immediate outputs are required?&#10;*What are the next steps?&#10;*What budget has the client or account lead set for this work?&#10;*What deadline are we working to?" 
                      disabled
                    >{{ $brief->budget_timings_and_outputs }}</textarea>
                  </div>           
                </div>
              </div>
            </div>
            <!-- / Budget, Timings and Outputs Required -->

            <!-- Brief Attachments -->
            <div class="panel panel-default">
              <div class="panel-heading">
                Brief Sheet Attachments
              </div>
              <div class="panel-body bg-light lter">
                <div class="row">
                  <div class="col-sm-12">
                    <ul>
                      @foreach ($brief->attachmentsNotAmend as $attachment)
                        <li>
                          <ul class="p-l-n l-s-n">
                            <li class="text-info">{{ $attachment->filename }}</li>
                            <li class="text-muted">Uploaded by {{ $attachment->user->forename }} - {{ $attachment->updated_at->format('h:m l d M Y') }}</li>
                          </ul>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Brief Attachments -->

            <!-- Ammendments -->
            <div class="panel panel-default col-sm-10 col-sm-offset-1">
              <div class="panel-heading">
                Amends
              </div>
              <div class="panel-body">                
                <form class="bs-example form-horizontal" action="{{ route('postnewamend') }}" method="post" enctype="multipart/form-data">
                <div class="row-fluid">
                  <div class="form-group">
                    Internal Amend <input type="checkbox" name="internal">
                  </div>
                  <div class="form-group">
                    <textarea 
                      name="content"
                      class="form-control" 
                      style="overflow:hidden;min-height:100px;" 
                      placeholder="Type new amend here.." 
                    >{{ old('new_amends') }}</textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 col-sm-12"> <!-- col-lg-10 col-sm-8 -->
                    <div class="form-group">
                      <input name="attachments[]" multiple ui-jq="filestyle" ui-options="{icon:false, buttonName:'btn-info', buttonText:'Attach Files'}" type="file">
                    </div>  
                  </div>
                  <div class="col-lg-2 col-sm-4 hide"> <!-- hide for now -->
                    <button class="btn btn-primary btn-block">Add File(s)</button>
                  </div>

                </div>

                <div class="row">
                  <div class="form-group">
                    <label class="col-lg-12 fom-control text-info">Who to notify?</label>
                    @foreach ($departments as $department)
                      <div class="col-lg-3">
                        <div class="checkbox1">
                          <label class="checkbox-inline1">
                            {{ $department->name }} 
                            <input 
                              class="form-control1"
                              type="checkbox" 
                              name="department[{{ $department->id }}]" 
                              value="{{ $department->id }}">
                            <i></i>
                          </label>
                        </div>           
                      </div>
                    @endforeach
                  </div>
                </div>

                <div class="row">
                  @if (count($errors) > 0)
                    <div class="col-sm-12">
                        <div class="alert alert-danger text-danger m-b-n">
                          <ul class="">
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                    </div>
                  @endif
                </div>

                <div class="row">
                  <div class="col-sm-12 text-center">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <input type="hidden" name="brief_id" value="{{ $brief->id }}">
                    <input type="submit" name="action" class="btn btn-md btn-success" value="Submit New Amend">
                  </div>
                </div>                
                </form>

                <div class="row">
                  @if (session('new_amend_success'))
                    <span class="alert-success p-r-sm p-l-sm">{{ session('new_amend_success') }}</span>
                  @endif
                </div>

                <div class="line line-dashed b-b line-lg"></div>

                @foreach ($brief->amendments as $amend)
                  <div class="row">
                    <div class="col-sm-12">
                      <h4>
                        Amend {{ $amend->id }} 
                        @if ($amend->is_internal)
                          - Internal
                        @endif
                      </h4>
                      <h6 class="text-muted">
                        {{ $amend->updated_at->format('h:m l, d M Y') }} - {{ $amend->user->forename }}
                      </h6>
                      <p>{{ $amend->content }}</p>
                      <ul>
                        @foreach ($amend->attachments as $attachment)
                          <li>
                            <p class="text-muted">{{ $attachment->filename }}</p>
                            <h6 class="text-muted">
                              Uploaded by: {{ $attachment->user->forename }} - {{ $attachment->updated_at->format('h:m l d M Y') }}</h6>
                          </li>
                        @endforeach
                      </ul>
                      <h6 class="text-muted">
                        Sent to: 
                        <?php
                          if (empty(trim($amend->department_ids))) {
                            echo 'none';
                          }
                          else {
                            $arr_department_ids = explode(',', $amend->department_ids);
                            $arr_department_name;
                            foreach ($departments as $department) {
                              if (in_array($department->id, $arr_department_ids)) {
                                $arr_department_name[] = $department->name;
                              }
                            }
                            echo implode($arr_department_name, ', ');
                            $arr_department_name = [];
                          }
                        ?>
                      </h6>
                    </div>
                  </div>
                  <div class="line line-dashed b-b line-lg"></div>
                @endforeach

              </div>
            </div>
            <!-- / Ammendments -->

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

  <!-- load JS/CSS dependencies -->
  <!-- data range picker -->  
  <script src="{{ URL::asset('libs/jquery/moment/moment.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('libs/jquery/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" type="text/css" />
  <script src="{{ URL::asset('libs/jquery/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <!-- multifile-upload -->
  <!--<script src="{{ URL::asset('libs/jquery/multifile-master/jQuery.MultiFile.min.js') }}"></script>-->


  <!-- load ACTION JS scripts -->
  <script src="{{ URL::asset('js/brief/init-daterangepicker.js') }}"></script>
  <script src="{{ URL::asset('js/brief/action-brief-new-client.js') }}"></script>  
  <!--<script src="{{ URL::asset('js/brief/action-brief-attachment.js') }}"></script>  -->

</div>
@endsection