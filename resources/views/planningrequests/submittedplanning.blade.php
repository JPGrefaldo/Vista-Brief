@extends('layouts.dashboard')

@section('title')
Create New Planning Request
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
    <div class="wrapper-md" id="newplanningwrapper">
      <div class="row">
        <div class="col-sm-12">

          <!-- Information -->
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
                      <select name="client" class="form-control" id="select-client" disabled>
                        @if (count($planning->client))
                          <option value="{{ $planning->client->id }}" selected>
                            {{ $planning->client->name }}
                          </option>
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
                    <label class="col-lg-3 control-label text-left">Taken By</label>
                    <div class="col-lg-9">
                      <input 
                        type="text" 
                        name="user_name" 
                        class="form-control" 
                        value="{{ $planning->taken_by }}" 
                        readonly>
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
                      <input 
                        type="text" 
                        name="contact_name" 
                        class="form-control" 
                        value="{{ $planning->contact_name }}" 
                        readonly>
                      <span class="help-block m-b-none"></span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-lg-3 control-label text-left">Contact Email</label>
                    <div class="col-lg-9">
                      <input 
                        type="text" 
                        name="contact_email" 
                        class="form-control" 
                        value="{{ $planning->contact_email }}" 
                        readonly>
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
                      <input 
                        type="text" 
                        name="contact_landline" 
                        class="form-control" 
                        value="{{ $planning->contact_landline }}" 
                        readonly>
                      <span class="help-block m-b-none"></span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-lg-3 control-label text-left">Contact Mobile</label>
                    <div class="col-lg-9">
                      <input 
                        type="text" 
                        name="contact_mobile" 
                        class="form-control" 
                        value="{{ $planning->contact_mobile }}" 
                        readonly>
                      <span class="help-block m-b-none"></span>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
          <!-- / Information -->

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
                      <input 
                        type="text" 
                        name="title" 
                        class="form-control" 
                        value="{{ $planning->title }}" 
                        readonly>
                      <span class="help-block m-b-none"></span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-lg-3 control-label text-left">Status</label>
                    <div class="col-lg-9">
                      <select name="jobstatus" class="form-control" disabled>
                        <option value="{{ $planning->jobstatus_id }}">{{ $planning->jobstatus->name }}</option>
                      </select>
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
                      <input 
                        type="text" 
                        name="budget" 
                        class="form-control" 
                        value="{{ $planning->budget }}"
                        readonly>
                      <span class="help-block m-b-none"></span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="col-lg-3 control-label text-left">Format of Response</label>
                    <div class="col-lg-9">
                      <select name="formatofresponse" class="form-control" disabled>
                        @if ($planning->formofresponse_id != 0)
                          @if (count($planning->formofresponse))
                            <option value="{{ $planning->formatofresponse_id }}" selected>
                              {{ $planning->formofresponse->name }}
                            </option>
                          @endif
                        @endif
                      </select>
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
              02 - Timings
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-3 col-md-6">
                  <div class="row-fluid">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">Pitch/Quote</label>
                      <div class="col-lg-8">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="pitch_quote_date"                             
                            value="@if(!empty($planning->pitch_quote_date)) {{ $planning->pitch_quote_date->format('m/d/Y') }} @endif" 
                            readonly/>
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_pitch_quote_date" disabled>
                              <i class="glyphicon glyphicon-calendar"></i>
                            </button>
                          </span>                      
                        </div>
                      </div>
                      <div class="col-lg-4 hide">
                        <div class="input-group w-md1">
                          <input type="text" class="form-control" name="pitch_quote_time" />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_pitch_quote_time">
                              <i class="glyphicon glyphicon-time"></i>
                            </button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="row-fluid">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">Ideal Q&amp;A</label>
                      <div class="col-lg-8">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="ideal_qa_date" 
                            value="@if(!empty($planning->ideal_qa_date)) {{ $planning->ideal_qa_date->format('m/d/Y') }} @endif"  
                            readonly/>
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_ideal_qa_date" disabled>
                              <i class="glyphicon glyphicon-calendar"></i>
                            </button>
                          </span>                      
                        </div>
                      </div>
                      <div class="col-lg-4 hide">
                        <div class="input-group w-md1">
                          <input type="text" class="form-control" name="ideal_qa_time" />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default">
                              <i class="glyphicon glyphicon-time"></i>
                            </button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="row-fluid">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">Ideal Review</label>
                      <div class="col-lg-8">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="ideal_review_date" 
                            value="@if(!empty($planning->ideal_review_date)) {{ $planning->ideal_review_date->format('m/d/Y') }} @endif"  
                            readonly/>
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_ideal_review_date" disabled>
                              <i class="glyphicon glyphicon-calendar"></i>
                            </button>
                          </span>                      
                        </div>
                      </div>
                      <div class="col-lg-4 hide">
                        <div class="input-group w-md1">
                          <input type="text" class="form-control" name="ideal_review_time" placeholder="hh:mm" />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default">
                              <i class="glyphicon glyphicon-time"></i>
                            </button>
                          </span>                      
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="row-fluid">
                    <div class="form-group">
                      <label class="col-lg-4 control-label text-left">Project Deadline</label>
                      <div class="col-lg-8">
                        <div class="input-group w-md1">
                          <input 
                            type="text" 
                            class="form-control" 
                            name="project_deadline_date" 
                            value="@if(!empty($planning->project_deadline_date)) {{ $planning->project_deadline_date->format('m/d/Y') }} @endif" 
                            readonly/>
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" id="btn_project_deadline_date" disabled>
                              <i class="glyphicon glyphicon-calendar"></i>
                            </button>
                          </span>                      
                        </div>
                      </div>
                      <div class="col-lg-4 hide">
                        <div class="input-group w-md1">
                          <input type="text" class="form-control" name="project_deadline_time" placeholder="hh:mm" />
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default">
                              <i class="glyphicon glyphicon-time"></i>
                            </button>
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
                    name="job_spec"
                    class="form-control" 
                    style="overflow:hidden;min-height:4px;" 
                    placeholder="Type the description of the work required" 
                    readonly
                  >{{ $planning->job_specifications }}</textarea>
                </div>          
              </div>
            </div>
          </div>
          <!-- / Job Spec -->
          
          <!-- Attachments -->
          <div class="panel panel-default">
            <div class="panel-heading">
              10 - Attached Files
            </div>
            <div class="panel-body bg-light lter">
              <div class="row">
                <div class="col-sm-12">
                  <ul>
                    @if (count($planning->attachments) < 1)
                      <li class="text-muted">no attachments</li>
                    @else
                      @foreach ($planning->attachments as $attachment)
                        <li>
                          <ul class="p-l-n l-s-n">
                            <li>
                              <i class="{{ $attachment->classNames }} text-md"></i>
                              <a 
                                class="text-brand1" 
                                href="{{ route('download_attachment', [$attachment->id]) }}">
                                {{ $attachment->filename }}
                              </a>
                            </li>
                            <li class="text-muted">
                              @if (count($attachment->user))
                                Uploaded by 
                                {{ $attachment->user->forename }} 
                                {{ $attachment->user->surname }} - 
                              @endif
                              {{ $attachment->updated_at->format('h:m l d M Y') }}
                            </li>
                          </ul>
                        </li>
                      @endforeach
                    @endif
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- / Attachments -->

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