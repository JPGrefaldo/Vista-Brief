@extends('layouts.dashboard')

@section('title')
Create New Brief Sheet
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
          <h1 class="m-n font-thin h3 text-black">Create New Brief Sheet</h1>
          <small class="text-muted">Welcome</small>
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md" id="newbriefwrapper">
      <div class="row">
        <div class="col-sm-12">          
          <form 
            id="form-newbrief" 
            class="bs-example form-horizontal" 
            action="{{ route('postnewbrief') }}" 
            method="post" 
            enctype="multipart/form-data">

            @if (count($errors) > 0)
            <div class="panel panel-default">
                <div class="alert alert-danger custom-text-danger-1 m-b-n">
                  <ul class="m-b-n m-l-n">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
            </div>
            @endif

            <!-- Information -->
            <div class="panel panel-default brief-panel">
              <div class="panel-body m-b-n m-t-xs">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">
                        Client 
                        <span class="custom-text-danger-1">*</span>
                      </label>
                      <div class="col-lg-8">
                        <select id="select-client" name="client" class="form-control">
                          <option value="">Select</option>
                          @foreach($clients as $client)
                            <option 
                              value="{{ $client->id }}" {{ (old('client') == $client->id) ? "selected":"" }}>
                                {{ $client->name }}
                            </option>
                          @endforeach
                          <option value="newclient" class="opt-newclient">[Add New Client]</option>
                        </select>
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">
                        Project Status 
                        <span class="custom-text-danger-1">*</span>
                      </label>
                      <div class="col-lg-8">
                        <select id="select-projectstatus" name="projectstatus" class="form-control">
                          <option value="">Select</option>
                          @foreach($projectstatus as $pstatus)
                            <option 
                              value="{{ $pstatus->id }}" 
                              data-color="{{ $pstatus->color }}" 
                              {{ (old('projectstatus') == $pstatus->id) ? "selected":"" }}>
                                {{ $pstatus->name }}
                            </option>
                          @endforeach
                        </select>
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">
                        Job Number 
                        <span class="custom-text-danger-1">*</span>
                      </label>
                      <div class="col-lg-8">
                        <input 
                          type="text" 
                          name="jobnumber" 
                          class="form-control" 
                          placeholder="Job Number" 
                          value="{{ old('jobnumber') }}"
                          maxlength="6">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">Old Job Number</label>
                      <div class="col-lg-8">
                        <input 
                          type="text" 
                          name="oldjobnumber" 
                          class="form-control" 
                          placeholder="Old Job Number" 
                          value="{{ old('oldjobnumber') }}"
                          maxlength="6">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">
                        Your Budget 
                        <i class="icon icon-question ctooltip tooltip-budget" data-toggle="tooltip" data-placement="right" title="The budget allocation the client has given or you have set to complete this work."></i>
                        <span class="custom-text-danger-1">*</span>
                      </label>
                      <div class="col-lg-8">
                        <input 
                          type="text" 
                          name="budget" 
                          class="form-control" 
                          placeholder="Your Budget" 
                          value="{{ old('budget') }}"
                          maxlength="50">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">
                        Project Manager 
                        <span class="custom-text-danger-1">*</span>
                      </label>
                      <div class="col-lg-8">
                        <input 
                          type="text" 
                          name="pmanager" 
                          class="form-control" 
                          placeholder="Project Manager" 
                          value="{{ (old('pmanager')) ? old('pmanager') : Auth::user()->forename.' '.Auth::user()->surname }}"
                          maxlength="50">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label text-left">
                    Job Name 
                    <i class="icon icon-question ctooltip tooltip-jobname" data-toggle="tooltip" data-placement="right" title="Job name as it appears in Access."></i>
                    <span class="custom-text-danger-1">*</span>
                  </label>
                  <div class="col-lg-10">
                    <input 
                      type="text" 
                      name="jobname" 
                      class="form-control" 
                      placeholder="Job Name" 
                      value="{{ old('jobname') }}"
                      maxlength="75">
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>
                <a href="required_dates" name="required_dates" id="required_dates"></a><!-- anchor -->
                <div class="form-group">
                  <label class="col-lg-2 control-label text-left">
                    Key Deliverables 
                    <i class="icon icon-question ctooltip tooltip-keydel" data-toggle="tooltip" data-placement="right" title="Name this Brief Sheet based on the specific deliverable it refers to i.e 'Opener Video' or 'Pitch Work'. Multiple Brief Sheets can be created against a single Job Number and identified by the name in this section."></i>
                    <span class="custom-text-danger-1">*</span>
                  </label>
                  <div class="col-lg-10">
                    <input 
                      type="text" 
                      name="keydeliverables" 
                      class="form-control" 
                      placeholder="Key Deliverables" 
                      value="{{ old('keydeliverables') }}"
                      maxlength="75">
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>

                <!-- Required dates -->
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">
                        Quote Required by
                      </label>
                      <div class="col-lg-8">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="quotereq" 
                            placeholder="dd/mm/yy"
                            value="{{ old('quotereq') }}" 
                            readonly />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_quotereq"><i class="glyphicon glyphicon-calendar"></i></button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">
                        Proposal Required by 
                      </label>
                      <div class="col-lg-8">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="proposedreq" 
                            placeholder="dd/mm/yy"                            
                            value="{{ old('proposedreq') }}" 
                            readonly />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_proposedreq"><i class="glyphicon glyphicon-calendar"></i></button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row m-b-xs">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">
                        1st Stage Required by
                      </label>
                      <div class="col-lg-8">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="stagereq" 
                            placeholder="dd/mm/yy"
                            value="{{ old('stagereq') }}" 
                            readonly />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_stagereq"><i class="glyphicon glyphicon-calendar"></i></button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">
                        Project Delivered by
                      </label>
                      <div class="col-lg-8">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="projdelivered" 
                            placeholder="dd/mm/yy"
                            value="{{ old('projdelivered') }}" 
                            readonly />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_projdelivered"><i class="glyphicon glyphicon-calendar"></i></button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- / Required dates -->
              </div>
            </div>
            <!-- / Information -->
            
            <div class="line line-dashed b-b line-lg pull-in hide"></div>

            <!-- Brief Summary -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                #01 - Brief Summary 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" title="Enter short overview description of the requirements here."></i> 
                <span class="panel-required custom-text-danger-1">*</span>
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      name="summary" 
                      class="form-control auto-height" 
                      style="min-height:50px" 
                      placeholder="Enter short overview description of the requirements here."
                      maxlength="500">{{ old('summary') }}</textarea>
                  </div>            
                </div>
              </div>
            </div>
            <!-- / Brief Summary -->

            <!-- Desciplines Required -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                #02 - Disciplines Required 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" title="Select which teams are required for the brief and indicate which Access team number there time should go against. Please ensure this is set up in Access before submitting brief."></i> 
                <span class="panel-required custom-text-danger-1">*</span>
              </div>
              <div class="panel-body m-b-n-sm m-t-xxs">                
                <div class="row" id="departmentCBModule">
                  @foreach ($departments as $department)
                    <div class="col-lg-3 m-b-sm">
                      <div class="checkbox checkbox-brand1 checkbox-md">
                        <input 
                          id="department{{$department->id}}" 
                          type="checkbox" 
                          name="department[{{$department->id}}]" 
                          value="{{$department->id}}"
                          @if(array_key_exists($department->id, old('department',[]))) checked @endif>
                        <label for="department{{$department->id}}">
                          {{$department->name}} 
                        </label>
                      </div>
                    </div>
                  @endforeach
                </div>

                <!-- Desciplines form attached file -->
                <div class="row">
                  <ul class="pull-right m-r-md text-brand-1 l-s-n" id="departmentAttachmentListBlock">
                    @foreach($departments as $department)
                      @if (count($department->attachment))
                        <li class="highlight1 hide" id="liDFile-{{$department->id}}">
                          <a href="{{route('download_attachment',[$department->attachment->id])}}">
                            download 
                            <i class="{{$department->attachment->classNames}}"></i> 
                            {{$department->attachment->filename}}</a>
                        </li>
                      @endif
                    @endforeach
                  </ul>
                </div>
                <!-- / Desciplines form attached file -->
              </div>
            </div>
            <!-- / Desciplines Required -->

            <!-- Objectives / Measure -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                #03 - Objectives / Measure 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" 
                  title="*What does the client want to achieve?&#;*Why?&#10;*What difference will that make to their business / audience / etc?&#10;*What does success looks like?&#10;*How will it be measured?">
                </i> 
                <span class="panel-required custom-text-danger-1">*</span>
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea
                      name="objmeasure" 
                      class="form-control auto-height" 
                      style="min-height:120px;" 
                      placeholder="*What does the client want to achieve?&#x0a;&#x09;&#10;*Why?&#x0a;&#x09;&#10;*What difference will that make to their business / audience / etc?&#x0a;&#x09;&#10;*What does success looks like?&#x0a;&#x09;&#10;*How will it be measured?"
                    >{{ old('objmeasure') }}</textarea>
                  </div>          
                </div>
              </div>
            </div>
            <!-- / Objectives / Measure -->

            <!-- Context -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                #04 - Context 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" 
                  title="*What is the background on the client?&#10;*What is the background on the issue?&#10;*Are there any other influencing issues?&#10;*Anything else we need to do?">
                </i> 
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea
                      name="context" 
                      class="form-control auto-height" 
                      style="min-height:100px;" 
                      placeholder="*What is the background on the client?&#10;*What is the background on the issue?&#10;*Are there any other influencing issues?&#10;*Anything else we need to do?"
                    >{{ old('context') }}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Context -->

            <!-- Target Audience and Insight -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                #05 - Target Audience and Insight 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" 
                  title="*Who?&#10;*What do we know about them that's relevant to this brief?&#10;*What do we need to find out?">
                </i> 
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      name="targetaudience_insight"
                      class="form-control auto-height" 
                      style="min-height:80px;" 
                      placeholder="*Who?&#10;*What do we know about them that's relevant to this brief?&#10;*What do we need to find out?"
                    >{{ old('targetaudience_insight') }}</textarea>
                  </div>         
                </div>
              </div>
            </div>
            <!-- / Target Audience and Insight -->

            <!-- What do want the target audience to -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                #06 - What do I want the target audience to...
              </div>
              <div class="panel-body m-b-n">
                <div class="row">
                  <div class="form-group m-b-n m-t-n">
                    <div class="col-lg-4">
                      <textarea 
                      name="targetaudience_think"
                      class="form-control auto-height" 
                      style="min-height:60px;" 
                      placeholder="Think?"
                      >{{ old('targetaudience_think') }}</textarea>
                    </div>
                    <div class="col-lg-4">
                      <textarea 
                      name="targetaudience_feel"
                      class="form-control auto-height" 
                      style="min-height:60px;" 
                      placeholder="Feel?"
                      >{{ old('targetaudience_feel') }}</textarea>
                    </div>
                    <div class="col-lg-4">
                      <textarea 
                      name="targetaudience_do"
                      class="form-control auto-height" 
                      style="min-height:60px;" 
                      placeholder="Do?"
                      >{{ old('targetaudience_do') }}</textarea>
                    </div>
                  </div>            
                </div>
              </div>
            </div>
            <!-- / What do want the target audience to -->

            <!-- Key Messages / Propositions -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                #07 - Key Messages / Propositions 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" 
                  title="*What's the key message(s) that we want to convey?&#10;*What action or mindset do we want to provoke?&#10;*What's the key benefit(s) for the audience?">
                </i> 
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      name="keymsg_propositions" 
                      class="form-control auto-height" 
                      style="min-height:80px;" 
                      placeholder="*What's the key message(s) that we want to convey?&#10;*What action or mindset do we want to provoke?&#10;*What's the key benefit(s) for the audience?"
                    >{{ old('keymsg_propositions') }}</textarea>
                  </div>             
                </div>
              </div>
            </div>
            <!-- / Key Messages / Propositions -->

            <!-- Creative -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                #08 - Creative 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" 
                  title="*Any creative steer from the client, likes and preferences?&#10;*Creative context / routes to avoid / recent campaigns to be aware of?&#10;*Any existing logos, brand guidelines or TOV?">
                </i> 
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      name="creative"
                      class="form-control auto-height" 
                      style="min-height:80px;" 
                      placeholder="*Any creative steer from the client, likes and preferences?&#10;*Creative context / routes to avoid / recent campaigns to be aware of?&#10;*Any existing logos, brand guidelines or TOV?"
                    >{{ old('creative') }}</textarea>
                  </div>            
                </div>
              </div>
            </div>
            <!-- / Creative -->

            <!-- Budget, Timings and Outputs Required -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                #09 - Budget, Timings and Outputs Required 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" 
                  title="*What immediate outputs are required?&#10;*What are the next steps?&#10;*What budget has the client or account lead set for this work?&#10;*What deadline are we working to?">
                </i> 
                <span class="panel-required custom-text-danger-1">*</span> 
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      name="budget_timings_outputs_req"
                      class="form-control auto-height" 
                      style="min-height:100px;" 
                      placeholder="*What immediate outputs are required?&#10;*What are the next steps?&#10;*What budget has the client or account lead set for this work?&#10;*What deadline are we working to?"
                    >{{ old('budget_timings_outputs_req') }}</textarea>
                  </div>           
                </div>
              </div>
            </div>
            <!-- / Budget, Timings and Outputs Required -->

            <!-- Attachments -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                #10 - Attachments 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" 
                  title="Attach any supporting material here. Provide multiple files in single zip folder where possible."> 
                </i> 
              </div>
              <div class="panel-body m-b-n">
                <div class="row" style="padding-left:15px;padding-right:15px">
                  <div class="col-lg-12 col-sm-12"> <!-- col-lg-10 col-sm-8 -->
                    <div class="form-group">
                      <input name="attachments[]" class="" multiple ui-jq="filestyle" ui-options="{icon:false, buttonName:'btn-brand1', buttonText:'Attach Files'}" type="file">
                    </div>  
                  </div>
                </div>
              </div>
            </div>
            <!-- / Attachments -->

            <!-- Notes -->
            <div class="panel panel-default hide">
              <div class="panel-body">
                Need help writing the brief? Click here and request Specialist Support. Remember to save your brief as draft before closing.
              </div>
            </div>
            <!-- / Notes -->

            @if (count($errors) > 0)
            <div class="panel panel-default">
                <div class="alert alert-danger custom-text-danger-1 m-b-n">
                  <ul class="m-b-n">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
            </div>
            @endif

            <div class="panel panel-default brief-panel">
              <div class="panel-footer">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <div class="row">
                  <div class="col-lg-6">
                    <input id="btn-draft" type="submit" name="action" class="btn btn-lg btn-block btn-brand1" value="Save as Draft">
                    <input id="btn-submit" type="submit" name="action" class="btn btn-lg btn-block btn-brand1 hide" value="Submit">
                  </div>
                  <div class="col-lg-6">
                    <button id="btn-fakesubmit" class="btn btn-lg btn-block btn-brand1">Submit</button>
                  </div>
                  <div class="col-lg-12">
                    <button id="btn-submitting" class="btn btn-lg btn-block btn-brand1 btn-submitting hide" disabled>
                      <div class="spinner1"></div> <span>Submitting..</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal: Add Client -->
    <div id="modal-add-client" class="modal" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create New Client</h4>
          </div>
          <div class="modal-body">
            <input id="input-newclient-name" class="form-control input-lg" type="text" name="newclientname" placeholder="Client Name">      
          </div>
          <div class="modal-footer">
            <div class="row">
              <div class="col-sm-4">
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
              </div>
              <div class="col-sm-8">
                <button type="button" class="btn btn-brand1 btn-block" id="btn-client-create">Create Client</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Modal -->

    <!-- Modal: Dates not all filled confirmation -->
    <div id="modal-dates-not-allfiled" class="modal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            <h4 class="font-bold">Not all Dates are filled!</h4>
            <h4>Are you sure you still want to submit?</h4>
            <div class="row m-t-md">
              <div class="col-sm-4 text-center">
                <button id="confirm_submit_no" class="btn btn-default">No</button>
              </div>
              <div class="col-sm-8 text-center">
                <button id="confirm_submit_yes" class="btn btn-brand1">Yes, please proceed</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Modal -->

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
  <!-- auto height -->
  <script src="{{ URL::asset('libs/jquery/jquery.textarea_autosize/jquery.textarea_autosize.js') }}"></script>  


  <!-- load ACTION JS scripts -->
  <script src="{{ URL::asset('js/brief/init-daterangepicker.js') }}"></script>
  <script src="{{ URL::asset('js/brief/action-brief-new-client.js') }}"></script>
  <script src="{{ URL::asset('js/brief/action-brief-ui.js') }}"></script>
  <script src="{{ URL::asset('js/brief/action-brief-form-ui.js') }}"></script>
  <script src="{{ URL::asset('js/brief/action-brief-new-department-checkbox-module.js') }}"></script>
  <script src="{{ URL::asset('js/brief/init-auto-height.js') }}"></script>
  <script src="{{ URL::asset('js/brief/module-btnsubmit-loading.js') }}"></script>
  <!--<script src="{{ URL::asset('js/brief/action-brief-attachment.js') }}"></script>  -->

</div>
@endsection