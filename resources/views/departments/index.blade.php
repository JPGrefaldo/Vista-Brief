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
          <h1 class="m-n font-thin h3 text-black">Manage Departments</h1>
          <small class="text-muted hide">welcome</small>
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md">
      <div class="panel panel-default col-lg-7">
        <div class="panel-body">
          <div>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>Department Name</th>
                  <th>Routing Email</th>
                  <th class="text-center"><i class="fa fa-cog"></i></th>
                </tr>
              </thead>
              <tbody id="tbody-department-list">
                @foreach($departments as $department)
                  <tr>
                    <td>
                      <input type="text" name="name" value="{{ $department->name }}" class="form-control" disabled>
                    </td>
                    <td>
                      <input type="text" name="email" value="{{ $department->email }}" class="form-control" disabled>
                    </td>
                    <td>
                      <div class="actionbox box-action-1 text-center">
                        <i class="glyphicon glyphicon-edit cpointer action-edit" title="edit"></i>
                        <i class="glyphicon glyphicon-remove cpointer action-remove" title="remove" data-dname="{{ $department->name }}" data-demail="{{ $department->email }}"></i>
                      </div>
                      <div class="editingbox hide box-action-1 text-center text-info">
                        <i class="glyphicon glyphicon-ok cpointer action-edit-save" title="save"></i>
                        <i class="glyphicon glyphicon-remove cpointer action-edit-cancel" title="cancel"></i>
                      </div>
                    </td>
                  </tr>
                @endforeach
                <tr id="tr-department-new" class="hide">
                  <td>
                    <div class="has-success">
                      <input type="text" name="new_name" value="" class="form-control" placeholder="Enter New Department Name">
                    </div>
                  </td>
                  <td>
                    <div class="has-success">
                      <input type="text" name="new_email" value="" class="form-control"  placeholder="Enter New Department Email">
                    </div>
                  </td>
                  <td>
                    <div class="box-action-1 text-center text-info">
                      <i class="glyphicon glyphicon-ok cpointer" title="save"></i>                 
                      <i id="add-department-cancel" class="glyphicon glyphicon-remove cpointer" title="cancel"></i>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <button id="add-department-btn" class="btn btn-success btn-lg btn-block">Add New Department</button>
                  </td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal: remove department -->
    <div id="modal-remove-department" class="modal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Remove</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to permanently remove this Department?</p>
            <p class="alert alert-danger">You are about to remove <strong><span id="department-name"></span></strong>!</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger">Yes! Please remove.</button>
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

  <script src="{{ URL::asset('js/department/action-department.js') }}"></script>

</div>
@endsection