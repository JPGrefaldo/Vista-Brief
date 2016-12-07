<!DOCTYPE html>
<html>
<head>
	<title>Brief Sheet Email - Vista Brief</title>
	<link rel="stylesheet" href="{{ URL::asset('css/font.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/font2.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" type="text/css" />
</head>
<body>

<h3>Vista Briefs</h3>
<span class="text-muted">{{ $updated_at }}</span>

<p><strong>Brief Sheet: {{ $jobnumber }} - {{ $jobname }}</strong></p>

<p>To <span class="text-muted">{{ $projectmanager }}; {{ $department_name }}</span></p>

<p>&nbsp;</p>
<p>Brief Summary:</p>
<p>{{ $brief_summary }}</p>

<p>&nbsp;</p>
<p>Amended Brief Sheet attached</p>

</body>
</html>