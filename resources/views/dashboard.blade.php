<!DOCTYPE html>
<html lang="en" class="">
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ URL::asset('libs/assets/animate.css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('libs/assets/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('libs/assets/simple-line-icons/css/simple-line-icons.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ URL::asset('css/app2.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/font.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" type="text/css" />
</head>
<body>

<header>
  <nav class="navbar navbar-default-fault navbar-xs">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Vista Brief System</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>

<div id="content" class="" role="main">
  <div class="app-content-body ">
	  <div class="row">
		<div class="col-sm-4 col-sm-offset-4">
	      <div class="panel panel-default noborder">
	        <div class="panel-heading font-bold hide">Sign In</div>
	        <div class="panel-body">
	          <form role="form">
	            <div class="form-group">
	              <label>Username</label>
	              <input type="email" class="form-control" placeholder="Enter email">
	            </div>
	            <div class="form-group">
	              <label>Password</label>
	              <input type="password" class="form-control" placeholder="Password">
	            </div>
	            <div class="text-center">
	              <button type="submit" class="btn btn-sm btn-primary">Sign In</button>
	            </div>
	          </form>
	        </div>
	      </div>
	    </div>
	  </div>
  </div>
</div>

<script src="{{ URL::asset('libs/jquery/jquery/dist/jquery.js') }}"></script>
<script src="{{ URL::asset('libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('js/ui-load.js') }}"></script>
<script src="{{ URL::asset('js/ui-jp.config.js') }}"></script>
<script src="{{ URL::asset('js/ui-jp.js') }}"</script>
<script src="{{ URL::asset('js/ui-nav.js') }}"></script>
<script src="{{ URL::asset('js/ui-toggle.js') }}"></script>
<script src="{{ URL::asset('js/ui-client.js') }}"></script>

</body>
</html>