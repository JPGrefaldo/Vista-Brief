<!DOCTYPE html>
<html>
<head>
	<title>New User - Vista Brief</title>
</head>
<body>

<h3>{{ $title }}</h3>

<p>
An account on <strong>Vista Brief</strong> have been created for you. You can now login <a href="{{ route('signin') }}">here</a> using your account details below.
</p>

<h4>Account Details</h4>
<ul>
	<li>Username: <strong>{{ $username }}</strong></li>
	<li>Password: <strong>{{ $password }}</strong></li>
</ul>


</body>
</html>