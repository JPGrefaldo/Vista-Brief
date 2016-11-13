<!DOCTYPE html>
<html>
<head>
	<title>New User - Vista Brief</title>
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