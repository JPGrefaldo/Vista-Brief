<!DOCTYPE html>
<html>
<head>
	<title>Reset Password - Vista Brief</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ URL::asset('css/app2.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/font.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/font2.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" type="text/css" />
</head>
<body>

<h3>{{ $title }}</h3>

<p>
A request to change your password for VISTA Brief had been activated for your account. Click the link below to save your new password.
</p>

<p>
<a href="{{ route('formchangepassword', ['u'=>$username, 'k'=>$validation_key]) }}">
{{ route('formchangepassword', ['u'=>$username, 'k'=>$validation_key]) }}
</a>
</p>

<p>Your Account Username: <strong>{{ $username }}</strong></p>


</body>
</html>