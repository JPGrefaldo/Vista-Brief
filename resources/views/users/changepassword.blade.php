@extends('layouts.page')

@section('title')
Change Password - Vista
@endsection

@section('content')
<div class="app app-header-fixed ">
  <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;">
    <div class="wrapper text-center">
      <h1 class="h1 block m-t m-b-n text-brand-1">VISTA</h1>
    </div>
    <div class="m-b-lg">
      <div class="wrapper text-center">
        <h4 class="text-brand-1">Brief System</h4>
      </div>
      <div class="text-center m-t m-b">
        Enter your new password
      </div>

      <form name="form" class="form-validation1" method="post" action="{{ route('postchangepassword') }}">        
        <div class="list-group list-group-sm m-b-xs">
          <div class="list-group-item">
            <input type="password" name="password" placeholder="Type your New Password" class="no-border form-control">
          </div>
          <div class="list-group-item">
            <input type="password" name="password_confirmation" placeholder="Type again your New Password" class="no-border form-control">
          </div>
        </div>
        @if ($error = $errors->first('invalid_username'))
          <div class="alert-dangertext-danger wrapper text-center"> 
            {{ $error }}
          </div>
        @endif

        @if (session('status'))
          <div class="alert-success text-success wrapper text-center"> 
            {{ session('status') }}
          </div>
        @endif

        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <button type="submit" class="btn btn-lg bg-brand-1 btn-block text-white" ng-disabled='form.$invalid'>Submit New Password</button>

        <div class="text-center m-t m-b">
          Remember your password? <a href="{{ route('signin') }}" class="text-danger">Login here.</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

