<!DOCTYPE html>
<html>
<head>
	<title>New User - Vista Brief</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ URL::asset('css/app2.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/font.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/font2.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" type="text/css" />
</head>
<body>

<h3></h3>

<p>
An account on <strong>Vista Brief</strong> have been created for you. You can now login <a href="{{ route('signin') }}">here</a> using your account details below.
</p>

<p><u>Account Details:</u></p>
<ul>
	<li>Username: <strong>{{ $username }}</strong></li>
	<li>Password: <strong>{{ $password }}</strong></li>
</ul>


</body>
</html>