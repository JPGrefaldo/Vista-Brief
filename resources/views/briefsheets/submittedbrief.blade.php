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
    <div class="bg-light lter b-b wrapper-md">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <small class="text-muted">Brief Sheet:</small>
          <h1 class="m-n font-thin h3 text-black">{{$brief->jobname}}</h1>
        </div>
      </div>
    </div>
    <!-- / main header -->

    <div class="wrapper-md" id="briefwrapper">
      <div class="row">
        <div class="col-sm-12">
          <!-- new Brief form class divider -->
          <div class="bs-example form-horizontal">

            <div class="panel panel-info">
              <div class="panel-body bg-danger2">
                You can't edit this brief sheet as this had been submitted. You can add amends.
              </div>
            </div>

            @if (count($errors) > 0)
            <div class="panel panel-default">
              <div class="alert alert-danger custom-text-danger-1 m-b-n">
                <h5 class="m-t-xs">Amends Brief</h5>
                <ul class="m-l-n">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
            @endif

            @if (session('new_amend_success'))            
            <div class="panel panel-default">
              <div class="alert alert-success2 text-success2 m-b-n">
                <p>{{ session('new_amend_success') }}</p>
              </div>
            </div>
            @endif

            <!-- Information -->
            <div class="panel panel-default brief-panel">
              <div class="panel-body m-b-n m-t-xs">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">Client</label>
                      <div class="col-lg-8">
                        <select id="select-client" name="client" class="form-control" disabled>
                          @if (count($brief->client))
                            <option value="{{ $brief->client_id }}">{{ $brief->client->name }}</option>
                          @else
                            <option>&lt;Client Info Missing&gt;</option>
                          @endif
                        </select>
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">Project Status</label>
                      <div class="col-lg-8">
                        <select 
                          id="select-projectstatus" 
                          name="projectstatus" 
                          class="form-control" disabled>
                          <option 
                            value="{{ $brief->projectstatus_id }}" 
                            data-color="{{ $brief->projectstatus->color }}">{{ $brief->projectstatus->name }}</option>
                        </select>
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">Job Number</label>
                      <div class="col-lg-8">
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
                      <label class="col-lg-4 control-label text-left">Old Job Number</label>
                      <div class="col-lg-8">
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
                      <label class="col-lg-4 control-label text-left">
                        Your Budget 
                        <i class="icon icon-question ctooltip tooltip-budget" data-toggle="tooltip" data-placement="right" title="What budget allocation has the client or have you set to complete this work."></i>
                      </label>
                      <div class="col-lg-8">
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
                      <label class="col-lg-4 control-label text-left">Project Manager</label>
                      <div class="col-lg-8">
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
                  <label class="col-lg-2 control-label text-left">
                    Job Name 
                    <i class="icon icon-question ctooltip tooltip-jobname" data-toggle="tooltip" data-placement="right" title="Job name as it appears in Access."></i>
                  </label>
                  <div class="col-lg-10">
                    <input 
                      type="text" 
                      name="jobname" 
                      class="form-control" 
                      placeholder="Job Name" 
                      value="{{ $brief->jobname }}" 
                      title="{{ $brief->jobname }}" 
                      disabled>
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label text-left">
                    Key Deliverables 
                    <i class="icon icon-question ctooltip tooltip-keydel" data-toggle="tooltip" data-placement="right" title="Name this Brief Sheet based on the specific deliverable it refers to i.e 'Opener Video' or 'Pitch Work'. Multiple Brief Sheets can be created against a single Job Number and identified by the name in this section."></i>
                  </label>
                  <div class="col-lg-10">
                    <input 
                      type="text" 
                      name="keydeliverables" 
                      class="form-control" 
                      placeholder="Key Deliverables" 
                      value="{{ $brief->keydeliverables }}" 
                      title="{{ $brief->keydeliverables }}" 
                      disabled>
                    <span class="help-block m-b-none"></span>
                  </div>
                </div>

                <!-- Required dates -->
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">
                        Quote Required by</label>
                      <div class="col-lg-8">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="quotereq" 
                            placeholder="dd/mm/yy" 
                            value="@if(!empty($brief->quoted_required_by_at)) {{ $brief->quoted_required_by_at->format('d/m/Y') }} @endif" 
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
                            value="@if(!empty($brief->proposal_required_by_at)) {{ $brief->proposal_required_by_at->format('d/m/Y') }} @endif"
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
                </div>
                <div class="row m-b-xs">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">
                        1st Stage Required by</label>
                      <div class="col-lg-8" ng-controller="DatepickerDemoCtrl">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="stagereq" 
                            placeholder="dd/mm/yy" 
                            value="@if(!empty($brief->firststage_required_by_at)) {{ $brief->firststage_required_by_at->format('d/m/Y') }} @endif" 
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
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">
                        Project Delivered by</label>
                      <div class="col-lg-8" ng-controller="DatepickerDemoCtrl">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="projdelivered" 
                            placeholder="dd/mm/yy" 
                            value="@if(!empty($brief->project_delivered_by_at)) {{ $brief->project_delivered_by_at->format('d/m/Y') }} @endif"
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
                <!-- / Required dates -->
              </div>
            </div>
            <!-- / Information -->
            
            <div class="line line-dashed b-b line-lg pull-in hide"></div>

            <!-- Post New Amend -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                Post New Amend
              </div>
              <div class="panel-body m-b-sm">
                <form class="bs-example form-horizontal" action="{{ route('postnewamend') }}" method="post" enctype="multipart/form-data">
                <div class="row" style="padding-left:30px;padding-right:30px">
                  <div class="form-group">
                    <div class="checkbox checkbox-brand1 checkbox-md">
                      <input 
                        id="internalamend" 
                        type="checkbox" 
                        name="internal">
                      <label for="internalamend">
                        Internal Amend 
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row" style="padding-left:30px;padding-right:30px">
                  <div class="form-group">
                    <textarea 
                      name="content"
                      class="form-control auto-height" 
                      style="overflow:hidden;min-height:100px;" 
                      placeholder="Type new amend here.." 
                    >{{ old('content') }}</textarea>
                  </div>
                </div>

                <div class="row" style="padding-left:15px;padding-right:15px">
                  <div class="col-lg-12 col-sm-12">
                    <div class="form-group">
                      <input name="attachments[]" multiple ui-jq="filestyle" ui-options="{icon:false, buttonName:'btn-brand1', buttonText:'Attach Files'}" type="file">
                    </div>  
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12" id="departmentCBModule">
                    <p class="text-brand-1">Who to notify?</p>
                    @foreach ($departments as $department)
                      <div class="col-lg-3 m-b-sm m-l-n">
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
                </div>

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

                <div class="row">
                  @if (count($errors) > 0)
                    <div class="col-sm-12">
                      <div class="alert alert-danger custom-text-danger-1">
                        <h5 class="m-t-xs">Amends Brief</h5>
                        <ul class="m-l-n">
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  @endif
                </div>

                <div class="row">
                  <div class="col-sm-12 text-right">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <input type="hidden" name="brief_id" value="{{ $brief->id }}">
                    <input type="submit" name="action" class="btn btn-md btn-brand1" value="Submit New Amend">
                  </div>
                </div>                
                </form>
              </div>
            </div>
            <!-- / Post New Amend -->

            <!-- List of Ammendments -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                Amends
              </div>
              @if (count($brief->amendments) < 1)
              <div class="panel-body">
                <p class="text-muted">No amends yet.</p>
              </div>
              @else
              <div class="panel-body">
                <div class="line line-dashed b-b line-lg hide"></div>
                @foreach ($brief->amendments->reverse() as $key => $amend)
                  <div class="row p-sm">
                    <div class="col-sm-12">
                      <p><span class="text-lg font-bold">Amend {{ $key+1 }}</span>@if ($amend->is_internal)<span class="font-normal"> - Internal Amend</span>@endif</p>
                      <h6 class="text-muted">
                        {{ $amend->updated_at->format('H:i:s l, d M Y') }} - 
                        @if ($amend->user)
                          {{ $amend->user->forename }} {{ $amend->user->surname }}
                        @endif
                      </h6> 
                      <p>{!! nl2br(e($amend->content)) !!}</p>
                      
                      @foreach ($amend->attachments as $attachment)
                        <p class="">
                          <i class="{{ $attachment->classNames }} text-md"></i>
                          <a 
                            class="text-brand-1 a-hover-ltblue" 
                            href="{{ route('download_attachment', [$attachment->id]) }}">
                            {{ $attachment->filename }}
                          </a>
                        </p>
                      @endforeach
                      
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
              @endif <!-- / if(count($brief->amendments) < 1) -->
            </div>
            <!-- / List of Ammendments -->

            <!-- Brief Summary -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                #01 - Brief Summary 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" title="Enter short overview description of the requirements here."></i> 
              </div>
              <div class="panel-body bg-light lter">
                <div>
                  {!! nl2br(e($brief->summary)) !!}
                </div>
              </div>
            </div>
            <!-- / Brief Summary -->

            <!-- Desciplines Required -->
            <div class="panel panel-brand1 brief-panel bg-light lter">
              <div class="panel-heading">
                #02 - Disciplines Required 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" title="Select which teams are required for the brief and indicate which Access team number there time should go against. Please ensure this is set up in Access before submitting brief."></i> 
              </div>
              <div class="panel-body m-t-xs">
                <div class="row">
                  @foreach ($departments as $department)
                    <div class="col-lg-3 m-b-sm">
                      <div class="checkbox checkbox-brand1 checkbox-md">
                        <input 
                          disabled
                          id="department{{$department->id}}" 
                          type="checkbox" 
                          name="department[{{$department->id}}]" 
                          value="{{$department->id}}"
                          @if(in_array($department->id, explode(',',$brief->disciplines_required_ids)))
                            checked
                          @endif
                          >
                        <label for="department{{$department->id}}">
                          {{$department->name}} 
                        </label>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            <!-- / Desciplines Required -->

            <!-- Objectives / Measure -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                #03 - Objectives / Measure 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" 
                  title="*What does the client want to achieve?&#10;*Why?&#10;*What difference will that make to their business / audience / etc?&#10;*What does success looks like?&#10;*How will it be measured?">
                </i> 
              </div>
              <div class="panel-body bg-light lter">
                <div>
                  {!! nl2br(e($brief->objectives_or_measures)) !!}     
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
              <div class="panel-body bg-light lter">
                <div>
                  {!! nl2br(e($brief->content)) !!}
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
              <div class="panel-body bg-light lter">
                <div>
                  {!! nl2br(e($brief->targetaudience_and_insight)) !!}
                </div>
              </div>
            </div>
            <!-- / Target Audience and Insight -->

            <!-- What do want the target audience to -->
            <div class="panel panel-brand1 brief-panel">
              <div class="panel-heading">
                06 - What do I want the target audience to...
              </div>
              <div class="panel-body bg-light lter m-b-n">
                <div class="row">
                  <div class="col-lg-4">
                    <h4>Think</h4>
                    {!! nl2br(e($brief->targetaudience_think)) !!}
                  </div>
                  <div class="col-lg-4 b-l b-r">
                    <h4>Feel</h4>
                    {!! nl2br(e($brief->targetaudience_feel)) !!}
                  </div>
                  <div class="col-lg-4">
                    <h4>Do</h4>
                    {!! nl2br(e($brief->targetaudience_do)) !!}
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
              <div class="panel-body bg-light lter">
                <div>
                  {!! nl2br(e($brief->keymessages_or_propositions)) !!}        
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
              <div class="panel-body bg-light lter">
                <div>
                  {!! nl2br(e($brief->creative)) !!}           
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
              </div>
              <div class="panel-body bg-light lter">
                <div>
                  {!! nl2br(e($brief->budget_timings_and_outputs)) !!}          
                </div>
              </div>
            </div>
            <!-- / Budget, Timings and Outputs Required -->

            <!-- Brief Attachments -->
            <div class="panel panel-brand1 brief-panel bg-light lter">
              <div class="panel-heading">
                #10 - Brief Sheet Attached Files 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" 
                  title="Attach any supporting material here. Provide multiple files in single zip folder where possible."> 
                </i> 
              </div>
              <div class="panel-body m-b-n">
                <div class="row">
                  <div class="col-sm-12">
                    <a name="amending"></a> <!-- amending anchor -->
                      @if (count($brief->attachmentsNotAmend) < 1)
                        <p class="text-muted">No attachment.</p>
                      @else
                        <ul class="p-l-n l-s-n">
                        @foreach ($brief->attachmentsNotAmend as $attachment)
                          <li>
                            <ul class="p-l-n l-s-n">
                              <li>
                                <i class="{{ $attachment->classNames }} text-md"></i>
                                <a 
                                  class="text-brand1 a-hover-ltblue" 
                                  href="{{ route('download_attachment', [$attachment->id]) }}">
                                  {{ $attachment->filename }}
                                </a>
                              </li>
                              <li class="text-muted">Uploaded by 
                                @if (count($attachment->user))
                                  {{ $attachment->user->forename }} 
                                  {{ $attachment->user->surname }} 
                                @else
                                  &lt;missing user info&gt;
                                @endif
                                 - {{ $attachment->updated_at->format('H:i:s l, d M Y') }}</li>
                            </ul>
                          </li>
                        @endforeach
                        </ul>
                      @endif
                  </div>
                </div>
              </div>
            </div>
            <!-- / Brief Attachments -->

          </div>
          <!-- new Brief form class divider -->
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
  <!-- auto height -->
  <script src="{{ URL::asset('libs/jquery/jquery.textarea_autosize/jquery.textarea_autosize.js') }}"></script> 


  <!-- load ACTION JS scripts -->
  <!--<script src="{{ URL::asset('js/brief/init-daterangepicker.js') }}"></script>-->
  <script src="{{ URL::asset('js/brief/action-brief-new-client.js') }}"></script> 
  <script src="{{ URL::asset('js/brief/action-brief-ui.js') }}"></script>
  <script src="{{ URL::asset('js/brief/init-auto-height.js') }}"></script>
  <script src="{{ URL::asset('js/brief/action-brief-new-department-checkbox-module.js') }}"></script>
  <!--<script src="{{ URL::asset('js/brief/action-brief-attachment.js') }}"></script>  -->

</div>
@endsection