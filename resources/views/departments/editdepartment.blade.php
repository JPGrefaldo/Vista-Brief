@extends('layouts.dashboard')

@section('title')
Manage Departments - Vista
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
          <h1 class="m-n font-thin h3 text-black">Edit Department</h1>
          <small class="text-muted hide">welcome</small>
        </div>
      </div>
    </div>
    <!-- / main header -->

    <div class="wrapper-md">
      <div class="panel panel-default">
        <div class="panel-body">
          <!-- template-department-edit -->
          <div class="template-department-edit">
            <form method="post" action="{{route('posteditdepartment')}}" enctype="multipart/form-data">
            <div class="row m-b-lg">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Name</label>
                  <input 
                    class="form-control" 
                    type="text" 
                    name="name" 
                    placeholder="department name" 
                    value="{{(old('name')) ? old('name') : $department->name}}">
                </div>
                <div class="form-group" id="attachfileModule">                
                  <label>Attachment</label>
                  @if (count($department->attachment))
                    <div class="form-group" id="fileCurrent">                    
                      <a href="{{route('download_attachment',[$department->attachment->id])}}" class="text-brand-1 p-r-sm">
                        <i class="{{$department->attachment->classNames}}"></i> 
                        <u>{{$department->attachment->filename}}</u></a>                    
                      <button class="btn btn-info btn-sm" id="btnUploadNew">
                        <i class="glyphicon glyphicon-upload"></i> Upload New</button>
                      <button class="btn btn-danger btn-sm" id="btnDeleteCurrent">
                        <i class="glyphicon glyphicon-trash"></i> Delete</button>
                    </div>
                    <div class="form-group hide" id="fileDeletedBlock">
                      <span>&lt;delete current file&gt;</span>
                      <input type="hidden" name="deletecurrentfile" value="0">
                      <button class="btn btn-info btn-sm">Undo</button>
                    </div>
                    <div class="form-group hide" id="fileUploadBlock">
                      <input 
                        class="form-control m-b-sm" 
                        type="file" 
                        name="attachment" 
                        placeholder="attachment">
                      <button class="btn btn-brand1 btn-sm">Cancel</button>
                    </div>                  
                  @else
                    <div class="form-group">
                      <input 
                        class="form-control m-b-sm" 
                        type="file" 
                        name="attachment" 
                        placeholder="attachment">
                    </div>
                  @endif  
                </div>
              </div>
              <div class="col-sm-6" id="routingEmailModule">
                <div class="form-group">
                  <label class="col-sm-12">Routing Emails</label>
                </div>
                <div class="form-group emailBlocks">
                  <div class="col-sm-8 m-b-sm">
                    <input 
                      class="form-control" 
                      type="text" 
                      name="email[]" 
                      placeholder="email">
                  </div>
                  <div class="col-sm-4"></div>
                </div>
                <div class="form-group" id="AddEmailBox">
                  <div class="col-sm-8">                                  
                    <button class="btn btn-info btn-sm btn-block" id="btnAddEmail">
                      <i class="glyphicon glyphicon-plus"></i> Add Email</button>
                  </div>
                  <div class="col-sm-4">
                  </div>
                </div>
              </div>
            </div>

            <div id="emailBlockTemplate" class="hide">
              <div class="form-group emailBlocks">
                <div class="col-sm-8 m-b-sm">
                  <input class="form-control" type="text" name="temp_email[]" placeholder="email">
                </div>
                <div class="col-sm-4">
                  <button class="btn btn-danger btn-sm btnRemoveEmail" title="remove email">
                  <i class="glyphicon glyphicon-remove"></i></button>
                </div>
              </div>
            </div>

            <div class="row text-center">
              <button class="btn btn-success btn-lg">
                {{ csrf_field() }}
                <i class="fa fa-check"></i> Save Changes</button>
            </div>
            </form>
          </div>
          <!-- template-department-edit -->
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

  <script src="{{ URL::asset('js/department/action-department-edit-ui.js') }}"></script>

</div>
@endsection