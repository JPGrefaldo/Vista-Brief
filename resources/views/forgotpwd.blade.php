@extends('layouts.page')

@section('title')
Retrieve Password
@endsection

@section('content')
<div class="app app-header-fixed ">
  

<div class="container w-xl w-auto-xs" ng-init="app.settings.container = false;">
  <a href class="navbar-brand block m-t">Retrieve Password</a>
  <div class="m-b-lg">
    <div class="wrapper text-center">
      <strong>Input your username to reset your password</strong>
    </div>
    <form name="reset" ng-init="isCollapsed=true">
      <div class="list-group list-group-sm">
        <div class="list-group-item">
          <input type="username" placeholder="Uername" ng-model="username" class="form-control no-border" required>
        </div>
      </div>
      <button type="submit" ng-disabled="reset.$invalid" class="btn btn-lg btn-primary btn-block"  ng-click="isCollapsed = !isCollapsed" >Send</button>
    </form>
    <div collapse="isCollapsed" class="m-t">
      <div class="alert alert-success">
        <p>A reset link sent to your email address, please check it in 7 days. <a ui-sref="access.signin" class="btn btn-sm btn-success" href="signin">Sign in</a></p>
      </div>
    </div>
  </div>
  <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
    <p>
  <small class="text-muted hide">Web app framework base on Bootstrap and AngularJS<br>&copy; 2014</small>
</p>
  </div>
</div>


</div>
@endsection

