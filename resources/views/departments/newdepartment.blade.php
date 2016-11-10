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
          <h1 class="m-n font-thin h3 text-black">Add New Department</h1>
          <small class="text-muted hide">welcome</small>
        </div>
      </div>
    </div>
    <!-- / main header -->

    <div class="wrapper-md">

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
        <div class="panel-body">
          <!-- template-department-addnew -->
          <div class="template-department-addnew">
            <form method="post" action="{{ route('postnewdepartment') }}" enctype="multipart/form-data">
            <div class="row m-b-lg">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Name</label>
                  <input 
                    class="form-control" 
                    type="text" 
                    name="name" 
                    placeholder="department name" 
                    value="{{old('name')}}">
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
                @if(!is_array(old('email')))
                  <div class="form-group emailBlocks">
                    <div class="col-sm-8 m-b-sm">
                      <input 
                        class="form-control" 
                        type="text" 
                        name="email[]" 
                        placeholder="email" 
                        value="{{old('email[0]')}}">
                    </div>
                    <div class="col-sm-4"></div>
                  </div>
                @else
                  @foreach(old('email') as $e)
                    <div class="form-group emailBlocks">
                      <div class="col-sm-8 m-b-sm">
                        <input 
                          class="form-control" 
                          type="text" 
                          name="email[]" 
                          placeholder="email" 
                          value="{{$e}}">
                      </div>
                      <div class="col-sm-4"></div>
                    </div>
                  @endforeach
                @endif
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
                <i class="fa fa-check"></i> Submit</button>
            </div>
            </form>
          </div>
          <!-- template-department-addnew -->
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

  <script src="{{ URL::asset('js/department/action-department-new-ui.js') }}"></script>

</div>
@endsection