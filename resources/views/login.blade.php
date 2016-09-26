<!DOCTYPE html>
<html lang="en" class="">
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="{{ URL::asset('css/bootstrapmin.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ URL::asset('libs/assets/animate.css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('libs/assets/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('libs/assets/simple-line-icons/css/simple-line-icons.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ URL::asset('css/app2.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/font.css') }}" type="text/css" />
</head>
<body>
<div id="content" class="app-content" role="main">
  <div class="app-content-body ">
	  <div class="row">
		<div class="col-sm-6">
	      <div class="panel panel-default">
	        <div class="panel-heading font-bold">Basic form</div>
	        <div class="panel-body">
	          <form role="form">
	            <div class="form-group">
	              <label>Email address</label>
	              <input type="email" class="form-control" placeholder="Enter email">
	            </div>
	            <div class="form-group">
	              <label>Password</label>
	              <input type="password" class="form-control" placeholder="Password">
	            </div>
	            <div class="checkbox">
	              <label class="i-checks">
	                <input type="checkbox" checked disabled><i></i> Check me out
	              </label>
	            </div>
	            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
	          </form>
	        </div>
	      </div>
	    </div>
	  </div>
  </div>
</div>
</body>
</html>