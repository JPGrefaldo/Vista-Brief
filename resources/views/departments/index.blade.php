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

      @if (session('new_department_success'))
        <p class="p-r-sm p-l-n">
          <span class="alert-success2 p-r-sm p-l-sm p-t-xs p-b-xs">
            {{ session('new_department_success') }}</span></p>
      @endif

      @if (session('edit_department_success'))
        <p class="p-r-sm p-l-n">
          <span class="alert-success2 p-r-sm p-l-sm p-t-xs p-b-xs">
            {{ session('edit_department_success') }}</span></p>
      @endif

      <div class="panel panel-default">
        <div class="panel-body">
          <div>
            
            <table class="table table-borderless table-rowbar">
              <tbody id="departmentListModule">
                <tr>
                  <td>
                    <div class="text-right">
                      <a href="{{route('formnewdepartment')}}" class="btn btn-md btn-brand1">
                        <i class="glyphicon glyphicon-plus"></i> Add New Department</a>
                    </div>
                  </td>
                </tr>
                @foreach($departments as $department)
                <tr>
                  <td>
                    <div class="div-rowbar">
                      <div class="row-fluid">
                        <div class="action-btn pull-right">
                          <a href="{{ route('formeditdepartment', $department->id) }}" class="btn btn-brand1 btn-sm">
                            <i class="fa fa-edit"></i> Edit</a>
                          <button 
                            class="btn btn-danger btn-danger2 btn-sm btnsDelete" 
                            data-did="{{$department->id}}" 
                            data-dname="{{$department->name}}">
                            <i class="fa fa-trash-o"></i> Delete</button>
                        </div>
                        <h4 class="text-brand-1 m-t-xxs">{{$department->name}}</h4> 
                      </div>
                      <div class="row-fluid">
                        @if (count($department->attachment))
                          <attachment>
                            @if ($department->attachment->classNames)
                              <i class="{{$department->attachment->classNames}}"></i>
                            @endif
                            <a 
                              href="{{route('download_attachment',[$department->attachment->id])}}"
                              class="text-brand-1 a-hover-ltblue">
                              <u>{{$department->attachment->filename}}</u>
                            </a>
                          </attachment> |
                        @endif
                        
                        @if (!empty($department->emails))
                          @foreach ($department->emails as $email)
                            <span class="highlight1">
                              {{$email}}, 
                            </span>
                            @endforeach
                        @endif
                      </div>
                    </div>                    
                  </td>
                </tr>
                @endforeach

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
            <h4 class="modal-title">Delete</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to permanently remove this Department?</p>
            <p class="alert alert-danger">You are about to remove <strong><span id="department-name"></span></strong>!</p>
            <input type="hidden" id="id-to-be-deleted" value="" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger" id="remove-department-save">Yes! Please remove.</button>
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