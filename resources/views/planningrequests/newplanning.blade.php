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
          <small class="text-muted">Welcome</small>
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md" id="newplanningwrapper">
      <div class="row">
        <div class="col-sm-12">          
          <form 
            id="form-newplanning" 
            class="bs-example form-horizontal" 
            action="{{ route('postnewplanning') }}" 
            method="post" 
            enctype="multipart/form-data">

            @if (count($errors) > 0)
            <div class="panel panel-default">
                <div class="alert alert-danger text-danger m-b-n">
                  <ul class="m-b-n">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
            </div>
            @endif

            <!-- Information -->
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">
                        Client 
                        <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-9">
                        <select name="client" class="form-control" id="select-client">
                          <option value="">select</option>
                          @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ (old('client') == $client->id) ? "selected":"" }}>{{ $client->name }}</option>
                          @endforeach
                          <option value="newclient">[new client]</option>
                        </select>
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">
                        Taken By 
                        <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-9">
                        <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}" readonly>
                        <input type="text" name="taken_by" class="form-control" value="{{ Auth::user()->forename }} {{ Auth::user()->surname }}">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">
                        Contact Name/Title 
                        <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-9">
                        <input type="text" name="contact_name" class="form-control" placeholder="Contact Name/Title" value="{{ old('contact_name') }}">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">
                        Contact Email
                        <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-9">
                        <input type="text" name="contact_email" class="form-control" placeholder="Contact Email" value="{{ old('contact_email') }}">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">
                        Contact Landline 
                        <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-9">
                        <input type="text" name="contact_landline" class="form-control" placeholder="Contact Landline" value="{{ old('contact_landline') }}">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">
                        Contact Mobile 
                        <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-9">
                        <input type="text" name="contact_mobile" class="form-control" placeholder="Contact Mobile" value="{{ old('contact_mobile') }}">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>               
              </div>
            </div>
            <!-- / Information -->

            <!-- Job Details -->
            <div class="panel panel-brand1">
              <div class="panel-heading">
                #01 - Job Details
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">
                        Title 
                        <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-9">
                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">
                        Status 
                        <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-9">
                        <select name="jobstatus" class="form-control">
                          <option value="">select</option>
                          @foreach ($jobstatus as $jstatus)
                            <option value="{{ $jstatus->id }}" {{ (old('jobstatus') == $jstatus->id) ? "selected":"" }}>{{ $jstatus->name }}</option>
                          @endforeach
                        </select>
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <a name="required_dates" id="required_dates"></a><!-- anchor -->
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">
                        Budget 
                        <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-9">
                        <input type="text" name="budget" class="form-control" placeholder="Budget" value="{{ old('budget') }}">
                        <span class="help-block m-b-none"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="col-lg-3 control-label text-left">
                        Format of Response 
                        <span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-9">
                        <select name="formatofresponse" class="form-control">
                          <option value="">select</option>
                          @foreach ($formatofresponses as $for)
                            <option value="{{ $for->id }}" {{ (old('formatofresponse') == $for->id) ? "selected":"" }}>{{ $for->name }}</option>
                          @endforeach
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
            <div class="panel panel-brand1">
              <div class="panel-heading">
                #02 - Timings
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="row-fluid">
                      <div class="form-group">
                        <label class="col-lg-3 control-label text-left">
                          Pitch/Quote 
                          <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                          <div class="input-group w-md1">
                            <input 
                              type="text" 
                              class="form-control" 
                              name="pitch_quote_date" 
                              placeholder="mm/dd/yy" 
                              value="{{ old('pitch_quote_date') }}" 
                              readonly/>
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" id="btn_pitch_quote_date">
                                <i class="glyphicon glyphicon-calendar"></i>
                              </button>
                            </span>                      
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="row-fluid">
                      <div class="form-group">
                        <label class="col-lg-3 control-label text-left">
                          Ideal Q&amp;A 
                          <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                          <div class="input-group w-md1">
                            <input 
                              type="text" 
                              class="form-control" 
                              name="ideal_qa_date" 
                              placeholder="mm/dd/yy" 
                              value="{{ old('ideal_qa_date') }}" 
                              readonly/>
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" id="btn_ideal_qa_date">
                                <i class="glyphicon glyphicon-calendar"></i>
                              </button>
                            </span>                      
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="row-fluid">
                      <div class="form-group">
                        <label class="col-lg-3 control-label text-left">
                          Ideal Review
                          <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                          <div class="input-group w-md1">
                            <input 
                              type="text" 
                              class="form-control" 
                              name="ideal_review_date" 
                              placeholder="mm/dd/yy" 
                              value="{{ old('ideal_review_date') }}" 
                              readonly/>
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" id="btn_ideal_review_date">
                                <i class="glyphicon glyphicon-calendar"></i>
                              </button>
                            </span>                      
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="row-fluid">
                      <div class="form-group">
                        <label class="col-lg-3 control-label text-left">
                          Project Deadline 
                          <span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-9">
                          <div class="input-group w-md1">
                            <input 
                              type="text" 
                              class="form-control" 
                              name="project_deadline_date" 
                              placeholder="mm/dd/yy" 
                              value="{{ old('project_deadline_date') }}"  
                              readonly/>
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-default" id="btn_project_deadline_date">
                                <i class="glyphicon glyphicon-calendar"></i>
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
            <div class="panel panel-brand1">
              <div class="panel-heading">
                #03 - 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" 
                  title="Enter a description of the work required."> 
                </i>
                Job Spec 
                <span class="text-danger">*</span>
              </div>
              <div class="panel-body">
                <div class="row-fluid">
                  <div class="form-group m-b-n m-t-n">
                    <textarea 
                      name="job_spec"
                      class="form-control auto-height" 
                      style="min-height:220px;" 
                      placeholder="Type the description of the work required"
                    >{{ old('job_spec') }}</textarea>
                  </div>          
                </div>
              </div>
            </div>
            <!-- / Job Spec -->
            
            <!-- Attachments -->
            <div class="panel panel-brand1">
              <div class="panel-heading">
                #04 - 
                <i class="icon icon-question ctooltip" data-toggle="tooltip" data-placement="right" 
                  title="Attach any supporting material here. Provide multiple files in single zip folder where possible.">
                </i>
                Attachments
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12 col-sm-12"> <!-- col-lg-10 col-sm-8 -->
                    <div class="form-group">
                      <input name="attachments[]" multiple ui-jq="filestyle" ui-options="{icon:false, buttonName:'btn-brand1', buttonText:'Attach Files'}" type="file">
                      <!--<input type="file" name="attachments[]" multiple class="btn1" readonly clas="form-control" > Browse-->
                    </div>  
                  </div>
                  <div class="col-lg-2 col-sm-4 hide"> <!-- hide for now -->
                    <button class="btn btn-primary btn-block">Add File(s)</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Attachments -->

            @if (count($errors) > 0)
            <div class="panel panel-default">
                <div class="alert alert-danger text-danger m-b-n">
                  <ul class="m-b-n">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
            </div>
            @endif

            <div class="panel panel-default">
              <div class="panel-footer">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input id="btn-submit" type="submit" class="btn btn-lg btn-brand1 btn-block" value="Submit">
                <button id="btn-fakesubmit" class="btn btn-lg btn-block btn-brand1 hide">Submit</button>
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
              <div class="col-sm-4 m-b-sm">
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
              </div>
              <div class="col-sm-8 m-b-sm">
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
              <div class="col-sm-4 text-center m-b-sm">
                <button id="confirm_submit_no" class="btn btn-default btn-block">No</button>
              </div>
              <div class="col-sm-8 text-center m-b-sm">
                <button id="confirm_submit_yes" class="btn btn-brand1 btn-block">Yes, please proceed</button>
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
  <!-- multifile-upload -->
  <!--<script src="{{ URL::asset('libs/jquery/multifile-master/jQuery.MultiFile.min.js') }}"></script>-->

  <!-- load ACTION JS scripts -->
  <script src="{{ URL::asset('js/planning/init-daterangepicker.js') }}"></script>
  <script src="{{ URL::asset('libs/jquery/jquery.textarea_autosize/jquery.textarea_autosize.js') }}"></script>
  <script src="{{ URL::asset('js/planning/action-planning-new-client.js') }}"></script> 
  <script src="{{ URL::asset('js/planning/action-planning-ui.js') }}"></script>
  <script src="{{ URL::asset('js/planning/action-planning-form-ui.js') }}"></script>
  <script src="{{ URL::asset('js/planning/init-auto-height.js') }}"></script>
  <!--<script src="{{ URL::asset('js/brief/action-brief-attachment.js') }}"></script>  -->

</div>
@endsection