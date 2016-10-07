@extends('layouts.page')

@section('title')
Signin - Vista
@endsection

@section('content')
<div class="app app-header-fixed ">
  <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;">
    <div class="wrapper text-center">
      <h1 class="h1 block m-t m-b-n text-brand-1">VISTA</h1>
    </div>
    <a href class="navbar-brand block m-t hide">VISTA Brief System</a>
    <div class="m-b-lg">
      <div class="wrapper text-center">
        <h4 class="text-brand-1">Brief System</h4>
      </div>
      <form name="form" class="form-validation1" method="post" action="{{ route('postsignin') }}">
        <div class="list-group list-group-sm m-b-xs">
          <div class="list-group-item">
            <input type="text" name="username" placeholder="Username" class="form-control no-border" value="{{ old('username') }}">
          </div>
          <div class="list-group-item">
             <input type="password" name="password" placeholder="Password" class="form-control no-border">
          </div>
        </div>
        @if ($error = $errors->first('invalid_login'))
          <div class="text-danger wrapper text-center"> 
            {{ $error }}
          </div>
        @endif

        <input type="hidden" name="_token" value="{{ Session::token() }}">
        <button type="submit" class="btn btn-lg bg-brand-1 btn-block text-white" ng-disabled='form.$invalid'>Log in</button>

        <div class="text-center m-t m-b">
          Forgot your password? <a ui-sref="access.forgotpwd" href="forgotpassword" class="text-danger">recover it.</a>
        </div>
        <div class="line line-dashed"></div>
        <p class="text-danger text-center hide1"><small>TEST ACCESS BELOW:</small></p>
        <a ui-sref="access.signup" class="btn btn-lg btn-default btn-block hide">Create an account</a>
      </form>
    </div>
    <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
      <p>
        <small class="text-muted hide1">username: admin | password: qwqwqw</small>
      </p><p>
        <small class="text-muted hide1">username: user1 | password: qwqwqw</small>
      </p>
    </div>
  </div>
</div>
@endsection

