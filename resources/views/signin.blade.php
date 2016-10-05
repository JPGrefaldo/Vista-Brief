@extends('layouts.page')

@section('title')
Signin - Vista
@endsection

@section('content')
<div class="app app-header-fixed ">
  <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;">
    <div class="wrapper text-center">
      <h1 class="h1 block m-t m-b-n" style="color:#00385b">VISTA</h1>
    </div>
    <a href class="navbar-brand block m-t hide">VISTA Brief System</a>
    <div class="m-b-lg">
      <div class="wrapper text-center">
        <h4 style="color:#00385b">Brief System</h4>
      </div>
      <form name="form" class="form-validation" action="dashboard">
        <div class="text-danger wrapper text-center" ng-show="authError">
            
        </div>
        <div class="list-group list-group-sm">
          <div class="list-group-item">
            <input type="email" placeholder="Email" class="form-control no-border" ng-model="user.email" required>
          </div>
          <div class="list-group-item">
             <input type="password" placeholder="Password" class="form-control no-border" ng-model="user.password" required>
          </div>
        </div>
        <button type="submit" class="btn btn-lg btn-brand-1 btn-block" style="background-color:#23b7e5;border-color:#23b7e5" ng-disabled='form.$invalid'>Log in</button>
        <div class="text-center m-t m-b">
          Forgot your password? <a ui-sref="access.forgotpwd" href="forgotpassword" class="text-danger">recover it.</a>
        </div>
        <div class="line line-dashed"></div>
        <p class="text-center hide"><small>Do not have an account?</small></p>
        <a ui-sref="access.signup" class="btn btn-lg btn-default btn-block hide">Create an account</a>
      </form>
    </div>
    <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
      <p>
    <small class="text-muted hide">Web app framework base on Bootstrap and AngularJS<br>&copy; 2014</small>
  </p>
    </div>
  </div>
</div>
@endsection

