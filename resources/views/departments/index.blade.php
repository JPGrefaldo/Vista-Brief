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
                <tr>
                  <td>
                    <input type="text" value="Events" class="form-control" disabled>
                  </td>
                  <td>
                    <input type="text" value="events@wearevista.com" class="form-control" disabled>
                  </td>
                  <td>
                    <a href="#">
                      <i class="glyphicon glyphicon-edit"></i> 
                    </a>
                    <a href="#">
                      <i class="glyphicon glyphicon-remove"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="text" value="Digital" class="form-control" disabled>
                  </td>
                  <td>
                    <input type="text" value="digital@wearevista.com" class="form-control" disabled>
                  </td>
                  <td>
                    <a href="#">
                      <i class="glyphicon glyphicon-edit"></i> 
                    </a>
                    <a href="#">
                      <i class="glyphicon glyphicon-remove"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="text" value="Strategy" class="form-control" disabled>
                  </td>
                  <td>
                    <input type="text" value="strategy@wearevista.com" class="form-control" disabled>
                  </td>
                  <td>
                    <a href="#">
                      <i class="glyphicon glyphicon-edit"></i> 
                    </a>
                    <a href="#">
                      <i class="glyphicon glyphicon-remove"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="text" value="Film" class="form-control" disabled>
                  </td>
                  <td>
                    <input type="text" value="film@wearevista.com" class="form-control" disabled>
                  </td>
                  <td>
                    <a href="#">
                      <i class="glyphicon glyphicon-edit"></i> 
                    </a>
                    <a href="#">
                      <i class="glyphicon glyphicon-remove"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="text" value="Content" class="form-control" disabled>
                  </td>
                  <td>
                    <input type="text" value="content@wearevista.com" class="form-control" disabled>
                  </td>
                  <td>
                    <a href="#">
                      <i class="glyphicon glyphicon-edit"></i> 
                    </a>
                    <a href="#">
                      <i class="glyphicon glyphicon-remove"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="text" value="Exhibitions" class="form-control" disabled>
                  </td>
                  <td>
                    <input type="text" value="exhibitions@wearevista.com" class="form-control" disabled>
                  </td>
                  <td>
                    <a href="#">
                      <i class="glyphicon glyphicon-edit"></i> 
                    </a>
                    <a href="#">
                      <i class="glyphicon glyphicon-remove"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="text" value="Designs" class="form-control" disabled>
                  </td>
                  <td>
                    <input type="text" value="designs@wearevista.com" class="form-control" disabled>
                  </td>
                  <td>
                    <a href="#">
                      <i class="glyphicon glyphicon-edit"></i> 
                    </a>
                    <a href="#">
                      <i class="glyphicon glyphicon-remove"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="text" value="Venue Hub" class="form-control" disabled>
                  </td>
                  <td>
                    <input type="text" value="venuehub@wearevista.com" class="form-control" disabled>
                  </td>
                  <td>
                    <a href="#">
                      <i class="glyphicon glyphicon-edit"></i> 
                    </a>
                    <a href="#">
                      <i class="glyphicon glyphicon-remove"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <input type="text" value="" class="form-control" placeholder="Enter New Department Name">
                  </td>
                  <td>
                    <input type="text" value="" class="form-control"  placeholder="Enter New Department Email">
                  </td>
                  <td>
                    <a href="#">
                      <i class="glyphicon glyphicon-ok"></i> 
                    </a>
                    <a href="#">
                      <i class="glyphicon glyphicon-remove"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                <td colspan="2">
                  <button class="btn btn-success btn-lg btn-block">Add New Department</button>
                </td>
                <td></td>
                </tr>
              </tbody>
            </table>
          </div>
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

<script>
jq2 = jQuery.noConflict();
$(function(){
  alert('ff');
});

$(document).ready(function() {
  alert('ready');
});
</script>

</div>
@endsection