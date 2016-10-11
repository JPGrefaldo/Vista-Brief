<!DOCTYPE html>
<html>
<head>
	<title>Reset Password - Vista Brief</title>
</head>
<body>

<h3>{{ $title }}</h3>

<p>
A request to change your password for VISTA Brief had been activated. Click the link below to enter your new password.
</p>

<p>
<a href="{{ route('formchangepassword', ['u'=>$username, 'k'=>$validation_key]) }}">
{{ route('formchangepassword', ['u'=>$username, 'k'=>$validation_key]) }}
</a>
</p>

<p>Your Account Username: <strong>{{ $username }}</strong></p>


</body>
</html>