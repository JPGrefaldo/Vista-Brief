<!DOCTYPE html>
<html>
<head>
	<title>Brief Sheet Email - Vista Brief</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ URL::asset('css/app2.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/font.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/font2.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" type="text/css" />
</head>
<body>

<h3>Vista Briefs</h3>
<span class="text-muted">{{ $updated_at }}</span>

<p><strong>Brief Sheet: {{ $jobnumber }} - {{ $jobname }}</strong></p>

<p>To <span class="text-muted">{{ $projectmanager }}, {{ $department_name }}</span></p>

<p>&nbsp;</p>
<p class="text-muted">Job Name:</p>
<p>{{ $jobname }}</p>

<p>&nbsp;</p>
<p class="text-muted">Key Deliverables:</p>
<p>{{ $keydeliverables }}</p>

<p>&nbsp;</p>
<p class="text-muted">Brief Summary:</p>
<p>{{ $brief_summary }}</p>

<p>&nbsp;</p>
<p class="text-muted"><i>Brief sheet attached</i></p>

</body>
</html>