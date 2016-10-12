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
                  <th><i class="fa fa-cog"></i></th>
                </tr>
              </thead>
              <tbody>
                @foreach($departments as $department)
                  <tr>
                    <td>
                      <input type="text" name="name" value="{{ $department->name }}" class="form-control" disabled>
                    </td>
                    <td>
                      <input type="text" name="email" value="{{ $department->email }}" class="form-control" disabled>
                    </td>
                    <td>
                      <div class="actionbox">
                        <i class="glyphicon glyphicon-edit cpointer action-edit" title="edit"></i>
                        <i class="glyphicon glyphicon-remove cpointer action-remove" title="remove" data-toggle="modal" data-target="#modal-remove-department" data-backdrop='false'></i>
                      </div>
                      <div class="editingbox hide">
                        <i class="glyphicon glyphicon-ok cpointer action-save" title="save"></i>
                        <i class="glyphicon glyphicon-remove cpointer action-cancel" title="cancel"></i>
                      </div>
                    </td>
                  </tr>
                @endforeach
                <tr id="tr-department-new" class="hide">
                  <td>
                    <div class="has-success">
                      <input type="text" value="" class="form-control" placeholder="Enter New Department Name">
                    </div>
                  </td>
                  <td>
                    <div class="has-success">
                      <input type="text" value="" class="form-control"  placeholder="Enter New Department Email">
                    </div>
                  </td>
                  <td>
                    <i class="glyphicon glyphicon-ok cpointer" title="save"></i>                 
                    <i id="new-department-cancel" class="glyphicon glyphicon-remove cpointer" title="cancel"></i>
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
    <div id="modal-remove-department" class="modal fade" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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