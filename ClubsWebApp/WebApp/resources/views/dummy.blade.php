<!DOCTYPE>
<html>
<head>
    <title>Make Dummy File</title>
</head>
<body>
<form method="post" action="/dummy">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<label>100 ramdom dummy files!</label>
<input type="submit">
</form>
</body>
</html>