<!DOCTYPE html>
<html>
<head>
	<title>Planning Request Email - Vista Brief</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<h3>Vista Briefs</h3>
<span class="text-muted">{{ $updated_at }}</span>

<p><strong>Planning Request: {{ $title }}</strong></p>

<p>To <span class="text-muted">{{ $client }}</span></p>

<p>Planning Request attached</p>

</body>
</html>