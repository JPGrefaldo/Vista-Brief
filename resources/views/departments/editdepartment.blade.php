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
            <form method="post" action="">
            <div class="row m-b-lg">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" type="text" name="name" placeholder="department name">
                </div>
                <div class="form-group">
                  <label>Attachment</label>
                  <input class="form-control" type="file" name="attachment" placeholder="attachment">
                </div>
              </div>
              <div class="col-sm-6" id="routingEmailModule">
                <div class="form-group">
                  <label class="col-sm-12">Routing Emails</label>
                </div>
                <div class="form-group emailBlocks">
                  <div class="col-sm-8 m-b-sm">
                    <input class="form-control" type="text" name="email[]" placeholder="email">
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
                  <input class="form-control" type="text" name="email[]" placeholder="email">
                </div>
                <div class="col-sm-4">
                  <button class="btn btn-danger btn-sm btnRemoveEmail" title="remove email">
                  <i class="glyphicon glyphicon-remove"></i></button>
                </div>
              </div>
            </div>

            <div class="row text-center">
              <button class="btn btn-success btn-lg">
                <i class="fa fa-check"></i> Submit</button>
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